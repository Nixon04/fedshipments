<script lang="ts" setup>
import { Link, usePage } from '@inertiajs/vue3';
import { ref, onMounted, computed, watch } from 'vue';
import headers from '../../components/headers.vue';
import Footer from '../../components/footer.vue';
import { useToggleBurger } from '../../reactive-component/toggle-burger';
import General_ads_info from '../../components/general_ads_info.vue';
import { useAuthController } from '../../reactive-component/auth-controller';
import { Toaster } from 'vue-sonner';
import Aside from '../components/aside.vue';
import topHeader from '../components/top-header.vue';
import { useEditors } from '../../reactive-component/editor';
const AssetImage = (filename: any) => `/asset_images/${filename}`;
const LogoImages = (filename: any) => `/icons_logos/${filename}`;
const togglecontroller = useToggleBurger();
const auth_controller = useAuthController();
const pages = usePage();
const data = (pages.props?.data as any) || [];

const editorsState = useEditors();


onMounted(() => {   
    editorsState.initCommit('Start up');
})



</script>

<template>
    <div>
      <Toaster position="top-right"/>
        <header>
            <title>Notification | Fedshipments</title>
        </header>


        <div class="nix-main">
            <div class="main-body-flex">
                <Aside :navtoggle="togglecontroller"/>
            <topHeader :toggle="togglecontroller"/>
            <div class="main-body-column">
                <div class="row gx-3 gy-2">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="d-flex justify-content-end gap-3 mb-5">
                            <div class="d-flex flex-column"> 
                              <div class="d-flex gap-3">
                                  <div @click="editorsState.sendPostContents(pages.props?.csrf_token as string, 'title' as string, 'sender')" :disabled="editorsState.isLoading" class="nix-mid-button text-white pointer p-2">
                                    <template v-if="editorsState.isLoading">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from EOS Icons by SUSE UX/UI team - https://gitlab.com/SUSE-UIUX/eos-icons/-/blob/master/LICENSE --><path fill="currentColor" d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z" opacity=".5"/><path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z"><animateTransform attributeName="transform" dur="1s" from="0 12 12" repeatCount="indefinite" to="360 12 12" type="rotate"/></path></svg>
                                      Loading
                                      </template>
                                      <template v-else>
                                        <span>
                                          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Myna UI Icons by Praveen Juge - https://github.com/praveenjuge/mynaui-icons/blob/main/LICENSE --><path fill="currentColor" d="M20.04 2.323c1.016-.355 1.992.621 1.637 1.637l-5.925 16.93c-.385 1.098-1.915 1.16-2.387.097l-2.859-6.432l4.024-4.025a.75.75 0 0 0-1.06-1.06l-4.025 4.024l-6.432-2.859c-1.063-.473-1-2.002.097-2.387z"/></svg>
                                        </span>
                                        Upload
                                      </template>
                                  </div>
                              </div>
                          </div>
                          </div>

                         <hr>

                         <div class="d-flex flex-column gap-3 mb-3">
                            <div class="textform-container">
                                <div class="input-text mb-2">
                                    <input type="text" class="form-control py-3" value="fedshipment@gmail.com" placeholder="From" readonly>
                                </div>
                                <div class="input-text mb-2">
                                    <input type="text" v-model="editorsState.to"  class="form-control py-3" placeholder="To/cc" >
                                </div>
                                <div class="input-text mb-2">
                                    <input type="text" v-model="editorsState.subject" class="form-control py-3" placeholder="Subject">
                                </div>
                            </div>
                         </div>

                        <div class="row gx-1 gy-1">
                            <div class="card-outline">
                                <div class="d-flex flex-column gap-3">
                                    <div class="">
                                        <div id="editorjs" class=" p-1"></div>
                                     </div>
                                </div>
                            </div>
                        </div>
                  </div>


                </div>
            </div>
            </div>
        </div>
    </div>
</template>