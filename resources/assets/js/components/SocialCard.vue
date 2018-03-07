<template>
    <div>
        <p class="w-full justify-between flex font-bold items-center text-secondary p-4 border-b border-secondary">
            <span class="text-left w-auto text-3xl font-brand font-bold text-secondary">
                Social Media
            </span>
            <small class="text-xs w-auto flex-grow text-right">Add your social media accounts</small>
        </p>

        <div class="w-full py-2 bg-white flex flex-wrap items-center border-b">
            <div class="w-auto py-2 pl-2 md:pl-4 text-md text-left md:text-right">
                facebook.com/
            </div>
            <input
                    type="text"
                    class="border-b border-secondary text-md bg-white w-auto md:max-w-16 text-left"
                    v-model="user.fb_page_id"
                    @blur="onSubmit"
            />
        </div>
        <div class="w-full py-2 bg-white flex max-w-full items-center border-b">
            <div class="w-auto py-2 pl-2 md:pl-4 text-md text-left md:text-right">
                youtube.com/channel/
            </div>
            <input
                    type="text"
                    class="border-b border-secondary text-md bg-white w-auto md:max-w-16 text-left"
                    v-model="user.youtube_channel_id"
                    @blur="onSubmit"
            />
        </div>
        <div class="w-full py-2 bg-white flex max-w-full items-center border-b">
            <div class="w-auto py-2 pl-2 md:pl-4 text-md text-left md:text-right">
                twitter.com/
            </div>
            <input
                    type="text"
                    class="border-b border-secondary text-md bg-white w-auto md:max-w-16 text-left"
                    v-model="user.twitter_handle"
                    @blur="onSubmit"
            />
        </div>
        <div class="w-full py-2 bg-white flex max-w-full items-center border-b">
            <div class="w-auto py-2 pl-2 md:pl-4 text-md text-left md:text-right">
                instagram.com/
            </div>
            <input
                    type="text"
                    class="border-b border-secondary text-md bg-white w-auto md:max-w-16 text-left"
                    v-model="user.instagram_handle"
                    @blur="onSubmit"
            />
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            dataUser: {
                type: Object,
                default: () => {
                }
            }
        },
        computed: {
            user: function () {
                return this.dataUser;
            }
        },
        methods: {
            onSubmit() {
                this.$emit('submit-button-clicked', this.user);
            }
        }
    }
</script>

