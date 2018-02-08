<template>
    <div>
        <div class="hidden md:flex flex-wrap">
            <slot />
        </div>
        <modal :modal-open="modalOpen">
            <div class="flex align-middle justify-between h-screen">
                <div class="flex left-arrow w-auto align-middle text-center p-4 cursor-pointer flex-col justify-center" >
                    <span
                        class="text-white text-bold text-xl p-6 bg-smoke-dark text-center"
                        @click="prevPhoto"
                    >
                        &lsaquo;
                    </span>
                </div>
                <div class="flex-auto flex-grow h-auto w-2/3 py-4 align-middle flex flex-col justify-center " >
                    <img class="w-auto h-auto max-h-full max-w-full" :src="activePhotoUrl" >
                </div>
                <div class="flex right-arrow w-auto align-middle text-center p-4 cursor-pointer flex flex-col justify-center" >
                    <span
                        class="text-white text-bold text-xl p-6 bg-smoke-dark text-center"
                        @click="nextPhoto"
                    >
                        &rsaquo;
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
            activePhotoUrl: ''
        };
    },
    mounted(){
        this.activePhotoUrl = this.photos[this.activePhoto].photourl;

        this.$parent.$on('openPhotoViewer', function () {
            this.$children[0].openPhotoViewer(0);
        });

    },
    methods: {
        openPhotoViewer(index){
            this.modalOpen = true;
            this.activePhoto = (index !== undefined ? index : this.activePhoto);
            let vm = this;
            setTimeout(function(){
                vm.activePhotoUrl = vm.photos[vm.activePhoto].photourl
            }, 200);
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