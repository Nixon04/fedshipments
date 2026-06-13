
<script lang="ts" setup>
import { Link } from '@inertiajs/vue3';
 const AssetImage = (filename:string) => `/assets/landing_images/${filename}`;
 const  {toggle} = defineProps<{
    toggle:any,
 }>();
</script>

<template>
    <div>
        <div class="header-align-container">
            <div class="header-align-body w-100 gap-3">
                <div class="cursor-pointer pointer mobile-display-none" @click="toggle.ToggleNavigationHolder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><path fill="currentColor" fill-rule="evenodd" d="M3.464 20.536C4.93 22 7.286 22 12 22s7.071 0 8.535-1.465C22 19.072 22 16.714 22 12s0-7.071-1.465-8.536C19.072 2 16.714 2 12 2S4.929 2 3.464 3.464C2 4.93 2 7.286 2 12s0 7.071 1.464 8.535M18.75 16a.75.75 0 0 1-.75.75H6a.75.75 0 0 1 0-1.5h12a.75.75 0 0 1 .75.75M18 12.75a.75.75 0 0 0 0-1.5H6a.75.75 0 0 0 0 1.5zM18.75 8a.75.75 0 0 1-.75.75H6a.75.75 0 0 1 0-1.5h12a.75.75 0 0 1 .75.75" clip-rule="evenodd"/></svg>
                </div>

                <div class="d-flex gap-3 align-items-center justify-content-end w-100">
                    <div class="avatar-profile-ping">
                        <img
                        src="https://ui-avatars.com/api/?name=Nixon+Sampson&background=0D6EFD&color=fff&size=128"
                        alt="Admin Avatar"
                        class="admin-avatar-img"
                    />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>