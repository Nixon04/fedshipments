<script lang="ts" setup>
const AssetImage = (filename: any) => `/asset_images/${filename}`;
const LogoImages = (filename: any) => `/icons_logos/${filename}`;
</script>

<template>
    <div>
        <section class="section-border nix-main-background py-3 p-3">
            <div class="nix-advert-card"
            :style="{ backgroundImage: `url(${AssetImage('flask-mask.png')})`, backgroundSize: 'cover', backgroundPosition: 'center' }"
            >
                <div class="row gx-1 gy-1">
                    <div class="col-lg-12 col-md-12 nix-advert-center">
                        <div class="d-flex flex-column nix-pad-50 text-center">
                            <div class="d-flex flex-column">
                                <span class="text-dark fw-bold fs-1 py-2">
                                   Ready to ship with confidence?
                                </span>

                                <span class="text-dark fs-3 py-2">
                                    Join 10,000 businesses to build trust among team members.
                                 </span>
                            </div>
                           <div>
                          </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="d-flex gap-2 justify-content-center py-3">
                <span class="text-white">Still have questions in mind? Email us at </span>
                <a href="mailto:info@fedshipments.com" class="text-decoration-underline text-white"> info@fedshipments.com</a>
            </div>
        </section>
    </div>
</template>