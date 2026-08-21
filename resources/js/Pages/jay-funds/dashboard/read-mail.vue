<script lang="ts" setup>
import headers from '../../components/headers.vue';
import Footer from '../../components/footer.vue';
import { useToggleBurger } from '../../reactive-component/toggle-burger';
import General_ads_info from '../../components/general_ads_info.vue';
import { useAuthController } from '../../reactive-component/auth-controller';
import { Link, usePage } from '@inertiajs/vue3';
import { Toaster } from 'vue-sonner';
import Aside from '../components/aside.vue';
import topHeader from '../components/top-header.vue';
const AssetImage = (filename: any) => `/asset_images/${filename}`;
const LogoImages = (filename: any) => `/icons_logos/${filename}`;
const togglecontroller = useToggleBurger();
const auth_controller = useAuthController();
import DOMPurify from 'dompurify';
const pages = usePage();
const email = pages.props?.email || [];

const sanitizeEmailHtml = (html: string | null | undefined): string => {
    if (!html) {
        return '';
    }

    return DOMPurify.sanitize(html, {
        USE_PROFILES: {
            html: true,
        },

        // Keep normal email formatting
        ALLOWED_TAGS: [
            'a',
            'abbr',
            'b',
            'blockquote',
            'br',
            'caption',
            'code',
            'col',
            'colgroup',
            'div',
            'em',
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
            'hr',
            'i',
            'img',
            'li',
            'ol',
            'p',
            'pre',
            'small',
            'span',
            'strong',
            'sub',
            'sup',
            'table',
            'tbody',
            'td',
            'tfoot',
            'th',
            'thead',
            'tr',
            'u',
            'ul',
        ],

        ALLOWED_ATTR: [
            'alt',
            'align',
            'border',
            'cellpadding',
            'cellspacing',
            'class',
            'colspan',
            'height',
            'href',
            'rel',
            'rowspan',
            'src',
            'style',
            'target',
            'title',
            'width',
        ],

        ALLOW_DATA_ATTR: false,
    });
}
</script>

<template>
    
    <div>
        <Toaster position="top-right"/>
        <header>
            <title>FedShipment | Read Mail</title>
        </header>
        <div class="nix-main">
            <div class="main-body-flex">
                <Aside :navtoggle="togglecontroller"/>
                <topHeader :toggle="togglecontroller"/>

                  <div class="main-body-column">
                    <div class="d-flex justify-content-between mb-4">
                        <Link href="/jay-funds/dashboard/receiver" class="text-dark">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><path fill="currentColor" fill-rule="evenodd" d="M10.53 5.47a.75.75 0 0 1 0 1.06l-4.72 4.72H20a.75.75 0 0 1 0 1.5H5.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0" clip-rule="evenodd"/></svg>
                            </div>
                        </Link>
                   </div>
                    <div class="card-outline">
                            <!-- <pre>
                                {{ email }}
                            </pre> -->

                        <div class="d-flex flex-column gap-3 p-3">
                            <div class="d-flex gap-1 align-items-center ">
                                <span>Created at:</span>
                                <span>{{auth_controller.formattedDate((email as any)?.created_at)}}</span>
                            </div>

                            <div class="d-flex gap-1 align-items-center ">
                                <span>From:</span>
                                <span>{{(email as any)?.from}}</span>
                            </div>
                            <div class="d-flex gap-1 align-items-center ">
                                <span>To:</span>
                                <span>{{(email as any)?.to[0]}}</span>
                            </div>
                            <hr>

                            <div class="d-flex gap-3 ">
                                <span>Subject:</span>
                                <span class="text-decoration-underline">{{(email as any)?.subject}}</span>
                            </div>

                            <!-- <div class="card-outline p-2">
                                <span>
                                    {{ (email as any)?.text }}
                                </span>
                            </div> -->
                            <div class="card-outline p-2">
                                <div
                                    v-if="(email as any)?.html"
                                    v-html="sanitizeEmailHtml((email as any).html)"
                                ></div>
                            
                                <div
                                    v-else-if="(email as any)?.text"
                                    style="white-space: pre-wrap;"
                                >
                                    {{ (email as any).text }}
                                </div>
                            
                                <div v-else class="text-muted">
                                    No email content available.
                                </div>
                            </div>

                        </div>

                    </div>
                  </div>
                </div>


        </div>
    </div>
</template>