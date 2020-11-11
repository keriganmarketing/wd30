<template>
    <div>
        <div class="hidden lg:flex flex-wrap">
            <slot />
        </div>
        <modal ref="modal" :modal-open="modalOpen">
            <div class="flex align-middle justify-between h-screen flex-wrap items-center">
                <div class="flex left-arrow w-1/2 md:w-auto align-middle text-center p-4 cursor-pointer flex-col justify-center order-2 md:order-1" >
                    <span
                        tabindex="0"
                        ref="prevButton"
                        class="text-white text-bold text-4xl p-6 pt-4 bg-primary text-center leading-none"
                        @click="prevPhoto"
                    >
                        &lsaquo; <span class="sr-only">Previous photo</span>
                    </span>
                </div>
                <div
                     class="flex-auto flex-grow is-4by3 md:pb-0 md:h-full md:h-full w-full md:w-2/3 py-4 align-middle flex flex-col justify-center bg-contain bg-center bg-no-repeat order-1 md:order-2"
                     :style="{ 'background-image': 'url(' + activePhotoUrl + ')' }"
                ></div>
                <div class="flex right-arrow w-1/2 md:w-auto align-middle text-center p-4 cursor-pointer flex flex-col justify-center order-3" >
                    <span
                        tabindex="0"
                        ref="nextButton"
                        class="text-white text-bold text-4xl p-6 pt-4 bg-primary text-center leading-none"
                        @click="nextPhoto"
                        @keydown.tab.prevent.stop="modal.$refs.closeButton.focus()"
                        @keydown.shift.tab.prevent.stop="$refs.prevButton.focus()"
                    >
                        &rsaquo; <span class="sr-only">Next photo</span>
                    </span>
                </div>
            </div>
        </modal>
    </div>
</template>
<script>
export default {
    data(){
        return {
            photos: this.$children,
            activePhoto: 0,
            modalOpen: false,
            activePhotoUrl: '',
            modal: ''
        };
    },
    mounted(){
        this.activePhotoUrl = this.photos[this.activePhoto].photourl
        let photoGallery = this
        this.modal = this.$refs.modal

        this.$parent.$on('openPhotoViewer', function () {
            // this.$children[0].openPhotoViewer(0);
            photoGallery.openPhotoViewer(0);
        });

    },
    methods: {
        openPhotoViewer(index){
            this.modalOpen = true;
            this.activePhoto = (index !== undefined ? index : this.activePhoto);
            let vm = this;
            let modal = this.$refs.modal

            setTimeout(function(){
                vm.activePhotoUrl = vm.photos[vm.activePhoto].photourl
                vm.focusClose()
            }, 200);
        },
        focusClose(){
            this.modal.$refs.closeButton.focus()
        },
        closeViewer(){
            this.modalOpen = false;
        },
        nextPhoto(){
            if(this.activePhoto < this.photos.length-2) {
                this.activePhoto++;
            }else{
                this.activePhoto = 0;
            }
            this.activePhotoUrl = this.photos[this.activePhoto].photourl
        },
        prevPhoto(){
            if(this.activePhoto !== 0) {
                this.activePhoto--;
            }else{
                this.activePhoto = this.photos.length-2;
            }
            this.activePhotoUrl = this.photos[this.activePhoto].photourl
        }
    }
}
</script> 