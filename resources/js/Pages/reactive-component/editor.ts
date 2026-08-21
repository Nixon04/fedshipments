import { defineStore } from 'pinia';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import EditorJS, { BlockToolConstructable, OutputData } from '@editorjs/editorjs';
import Paragraph from '@editorjs/paragraph';
import Header from '@editorjs/header';
import List from '@editorjs/list';
import Quote from '@editorjs/quote';
import Marker from '@editorjs/marker';
import LinkTool from '@editorjs/link';
import Delimiter from '@editorjs/delimiter';
import ImageTool from '@editorjs/image';
import edjsHTML from 'editorjs-html';
import axios from 'axios';
import { toast } from 'vue-sonner';
import 'vue-sonner/style.css';

export const useEditors = defineStore('useEditorsEdit', () => {
  const page = usePage();
  const editor = ref<EditorJS | null>(null);
  const chatContainer = ref<HTMLElement | null>(null);
  const edjsParser = edjsHTML();

  const subjectbody = ref('');
  const recipient = ref('');
  const progressindicator = ref<number>(0);
  const isLoading = ref(false);

  const token = document.head.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

  function htmlToEditorJS(html: string): OutputData {
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, 'text/html');
  
    const blocks: any[] = [];
  
    const createImageBlock = (img: HTMLImageElement) => {
      if (!img.src) return;
  
      blocks.push({
        type: 'image',
        data: {
          file: {
            url: img.src,
          },
          caption: img.alt || '',
          withBorder: false,
          withBackground: false,
          stretched: false,
        },
      });
    };
  
    const processNode = (node: Node) => {
      if (node.nodeType !== Node.ELEMENT_NODE) return;
  
      const element = node as HTMLElement;
      const tag = element.tagName.toLowerCase();
  
      // -------------------------
      // IMAGE
      // -------------------------
      if (tag === 'img') {
        createImageBlock(element as HTMLImageElement);
        return;
      }
  
      // -------------------------
      // PARAGRAPH
      // -------------------------
      if (tag === 'p') {
        const images = Array.from(
          element.querySelectorAll('img')
        );
  
        // Paragraph contains images
        if (images.length > 0) {
          // Get text without the images
          const clone = element.cloneNode(true) as HTMLElement;
  
          clone.querySelectorAll('img').forEach(img => {
            img.remove();
          });
  
          const text = clone.innerHTML.trim();
  
          if (text) {
            blocks.push({
              type: 'paragraph',
              data: {
                text,
              },
            });
          }
  
          // Add each image as its own EditorJS block
          images.forEach(img => {
            createImageBlock(img);
          });
  
          return;
        }
  
        // Normal paragraph
        blocks.push({
          type: 'paragraph',
          data: {
            text: element.innerHTML.trim() || '',
          },
        });
  
        return;
      }
  
      // -------------------------
      // HEADERS
      // -------------------------
      if (/^h[1-6]$/.test(tag)) {
        const level = parseInt(tag.charAt(1), 10);
  
        blocks.push({
          type: 'header',
          data: {
            text: element.innerHTML.trim() || '',
            level,
          },
        });
  
        return;
      }
  
      // -------------------------
      // BLOCKQUOTE
      // -------------------------
      if (tag === 'blockquote') {
        blocks.push({
          type: 'quote',
          data: {
            text: element.innerHTML.trim(),
            caption: '',
            alignment: 'left',
          },
        });
  
        return;
      }
  
      // -------------------------
      // DIV / SECTION / ARTICLE
      // -------------------------
      if (
        tag === 'div' ||
        tag === 'section' ||
        tag === 'article'
      ) {
        element.childNodes.forEach(child => {
          processNode(child);
        });
  
        return;
      }
  
      // -------------------------
      // OTHER ELEMENTS
      // -------------------------
      element.childNodes.forEach(child => {
        processNode(child);
      });
    };
  
    doc.body.childNodes.forEach(node => {
      processNode(node);
    });
  
    return {
      time: Date.now(),
      blocks,
    };
  }
  
  
  // ✅ Custom BackgroundColor Tool
  class BackgroundColorTool {
    static get toolbox() {
      return {
        title: 'BG Color',
        icon: '<svg width="18" height="18"><rect width="18" height="18" fill="#FFD54F"/></svg>',
      };
    }

    api: any;
    data: { color: string; text?: string };
    wrapper: HTMLElement | null;

    constructor({ data, api }: { data?: { color: string; text?: string }; api: any }) {
      this.api = api;
      this.data = data || { color: '#ffffff' };
      this.wrapper = null;
    }

    render() {
      this.wrapper = document.createElement('div');
      this.wrapper.style.backgroundColor = this.data.color;
      this.wrapper.style.padding = '20px';
      this.wrapper.style.minHeight = '40px';
      this.wrapper.innerHTML = this.data.text || '';
      return this.wrapper;
    }

    save(blockContent: HTMLElement) {
      return {
        color: blockContent.style.backgroundColor,
        text: blockContent.innerHTML,
      };
    }

    static get sanitize() {
      return {
        color: true,
        text: true,
      };
    }
  }


  function scrollToBottom() {
    const el = chatContainer.value;
    if (el) el.scrollTop = el.scrollHeight;
  }

  const initCommit = (items_check: string | OutputData | null) => {
    console.log('Item Check', items_check);
    let parsedData: OutputData = { blocks: [] };
    if (items_check && typeof items_check === 'string') {
      if (items_check.trim().startsWith('{')) {
        parsedData = JSON.parse(items_check);
      } else {
        parsedData = htmlToEditorJS(items_check);
      }
    }


    editor.value = new EditorJS({
      holder: 'editorjs',
    
      tools: {
        paragraph: {
          class: Paragraph as unknown as BlockToolConstructable,
          inlineToolbar: ['link', 'marker'],
        },
    
        header: {
          class: Header as unknown as BlockToolConstructable,
          inlineToolbar: true,
          config: {
            placeholder: 'Header text...',
            levels: [1, 2, 3, 4, 5, 6],
            defaultLevel: 3,
          },
        },
    
        list: {
          class: List as unknown as BlockToolConstructable,
          inlineToolbar: true,
        },
    
        quote: {
          class: Quote as unknown as BlockToolConstructable,
          inlineToolbar: true,
        },
    
        marker: Marker,
        delimiter: Delimiter,
        backgroundColor: BackgroundColorTool,
    
        linkTool: {
          class: LinkTool as unknown as BlockToolConstructable,
          config: {
            endpoint: '/editor/link',
            requestHeaders: {
              'X-CSRF-TOKEN': token,
              'X-Requested-With': 'XMLHttpRequest',
            },
          },
        },
    
        // Keep the ORIGINAL ImageTool
        image: {
          class: ImageTool as unknown as BlockToolConstructable,
    
          config: {
            endpoints: {
              byFile: '/endpoint/upload-blog-files',
              byUrl: '/endpoint/upload/url',
            },
    
            additionalRequestHeaders: {
              'X-CSRF-TOKEN': token,
              'X-Requested-With': 'XMLHttpRequest',
            },
          },
        },
      },
    
      autofocus: true,
    
      data: parsedData,
    
      placeholder: 'Type a message here...',
    
      onReady: () => {
        console.log(
          'Editor.js is ready with data:',
          parsedData
        );
    
        scrollToBottom();
      },
      
      onChange: async (api, event) => {
        const mutations = Array.isArray(event)
          ? event
          : [event];
      
        for (const mutation of mutations) {
          const change = mutation as CustomEvent;
      
          console.log(
            'Mutation type:',
            change.type
          );
      
          // Only handle block deletion
          if (change.type !== 'block-removed') {
            continue;
          }
      
          const removedBlock =
            change.detail?.target;
      
          if (!removedBlock) {
            console.log(
              'No removed block found'
            );
      
            continue;
          }
      
          try {
            /*
             * EditorJS returns a Promise here.
             */
            const removedData =
              await removedBlock.save();
      
            console.log(
              'REMOVED BLOCK DATA:',
              removedData
            );
      
            /*
             * EditorJS save() returns:
             *
             * {
             *   id: "...",
             *   tool: "image",
             *   data: {
             *     file: {
             *       url: "..."
             *     }
             *   },
             *   tunes: {},
             *   time: 0
             * }
             */
      
            if (
              removedData?.tool !== 'image'
            ) {
              console.log(
                'Removed block is not an image'
              );
      
              continue;
            }
      
            const imageUrl =
              removedData?.data?.file?.url;
      
            if (!imageUrl) {
              console.log(
                'Image block has no URL'
              );
      
              continue;
            }
      
            console.log(
              'IMAGE REMOVED FROM EDITOR:',
              imageUrl
            );
      
            /*
             * Tell Laravel to delete
             * the physical file.
             */
            const response = await fetch(
              '/endpoint/delete-blog-file',
              {
                method: 'POST',
      
                headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': token,
                  'X-Requested-With': 'XMLHttpRequest',
                },
      
                body: JSON.stringify({
                  url: imageUrl,
                }),
              }
            );
      
            const result =
              await response.json();
      
            console.log(
              'DELETE IMAGE RESPONSE:',
              result
            );
      
          } catch (error) {
            console.error(
              'IMAGE DELETE ERROR:',
              error
            );
          }
        }
      },

    });
    
    
  };

  const to = ref('');
  const from = ref('');
  const subject = ref('');

  const status_report = ref<boolean>(false);
  const sendPostContents = async (_csrf: any, vlog_title: string, vlog_image: any) => {
    try {
      if (!editor.value) {
        toast.error('Information must not be empty');
        return;
      }
      isLoading.value = true;

      const output = await editor.value.save();
      const parsed = edjsParser.parse(output);
      const htmlContent = Array.isArray(parsed) ? parsed.join('').trim() : parsed.trim();
  
      const formData = new FormData();
      formData.append('content',  htmlContent);
      formData.append('to', to.value);
      formData.append('from', from.value);
      formData.append('subject', subject.value);
     

      const response = await axios.post('/endpoint/send-email', formData, {
        headers: {
          'X-CSRF-TOKEN': _csrf,
          'Content-Type': 'multipart/form-data',
        },
        onUploadProgress: (progressEvent) => {
          if (progressEvent.total) {
            progressindicator.value = Math.round((progressEvent.loaded * 100) / progressEvent.total);
          }
        },
      });

      if (response.status === 200 && response.data.status === 'success') {
          status_report.value = true;
          toast.success(response.data.message);
           setTimeout(() => {
            window.location.href = ''
           }, 1000);
          return;

      } else {
        status_report.value = false;
        return toast.error(response.data.message || 'Something went wrong');
      }

    } catch (error: any) {
      console.error('Error:', error);

      if (error.response) {
        if (error.response.status === 422 && error.response.data.errors) {
          Object.values(error.response.data.errors).forEach((messages: any) => {
            messages.forEach((msg: string) => toast.error(msg));
          });
        } else {
          toast.error(error.response.data.message || 'Server Error');
        }
      } else {
        toast.error('Network error – please check your connection');
      }
    } finally {
      isLoading.value = false;
    }
  };


  const updateBlogContent = async (_csrf: any, id:any) => {
    try {
      if (!editor.value) {
        toast.error('Information must not be empty');
        return;
      }
      isLoading.value = true;

      const output = await editor.value.save();
      const parsed = edjsParser.parse(output);
      const htmlContent = Array.isArray(parsed) ? parsed.join('').trim() : parsed.trim();
  
      const formData = new FormData();
      formData.append('content',  htmlContent);
      formData.append('slug', id);
  

      const response = await axios.post('/endpoint/edit-blog-contents', formData, {
        headers: {
          'X-CSRF-TOKEN': _csrf,
          'Content-Type': 'multipart/form-data',
        },
        onUploadProgress: (progressEvent) => {
          if (progressEvent.total) {
            progressindicator.value = Math.round((progressEvent.loaded * 100) / progressEvent.total);
          }
        },
      });

      if (response.status === 200 && response.data.status === 'success') {
          status_report.value = true;
          toast.success(response.data.message);
           setTimeout(() => {
            window.location.href = '/ftc/isiomablanksonchannel/dash/articles'
           }, 1000);
          return;

      } else {
        status_report.value = false;
        return toast.error(response.data.message || 'Something went wrong');
      }

    } catch (error: any) {
      console.error('Error:', error);

      if (error.response) {
        if (error.response.status === 422 && error.response.data.errors) {
          Object.values(error.response.data.errors).forEach((messages: any) => {
            messages.forEach((msg: string) => toast.error(msg));
          });
        } else {
          toast.error(error.response.data.message || 'Server Error');
        }
      } else {
        toast.error('Network error – please check your connection');
      }
    } finally {
      isLoading.value = false;
    }
  };


  return {
    to,
    from,
    subject,
    updateBlogContent,
    status_report,
    edjsParser,
    subjectbody,
    recipient,
    editor,
    chatContainer,
    progressindicator,
    sendPostContents,
    isLoading,
    initCommit,
  };
});
