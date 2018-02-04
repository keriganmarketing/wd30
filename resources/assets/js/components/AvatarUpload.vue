<template>
<div>
    <form action="/avatar" method="POST" enctype="multipart/form-data">
        <h3 class="text-xl text-brand-lightest flex justify-center w-full">Profile</h3>
        <label for="avatar" class="bg-teal-lightest border h-32 w-full p-8 flex items-center justify-center rounded shadow">
            Click or drag a photo here to upload it
            <input type="file"
                   name="avatar"
                   class="hidden"
                   id="avatar"
                   @change="fileChanged(
                       $event.target.name,
                       $event.target.files
                    )"
            >
        </label>
    </form>
</div>
</template>

<script>
import { upload } from '../file-upload.service.js';
const STATUS_INITIAL = 0, STATUS_SAVING = 1, STATUS_SUCCESS = 2, STATUS_FAILED = 3;
export default {
    data () {
        return {
            uploadedFiles: [],
            uploadError: null,
            currentStatus: null,
            uploadFieldName: 'avatar'
        }
    },
    computed: {
        isInitial() {
            return this.currentStatus === STATUS_INITIAL;
        },
        isSaving() {
            return this.currentStatus === STATUS_SAVING;
        },
        isSuccess() {
            return this.currentStatus === STATUS_SUCCESS;
        },
        isFailed() {
            return this.currentStatus === STATUS_FAILED;
        }

    },
    methods: {
        reset() {
            this.currentStatus = STATUS_INITIAL;
            this.uploadedFiles = [];
            this.uploadError   = null;
        },
        save(formData) {
            this.currentStatus = STATUS_SAVING;
            upload(formData)
                .then(response => {
                    this.uploadedFiles = [].concat(x);
                    this.currentStatus = STATUS_SUCCESS;
                })
                .catch(err => {
                    this.uploadError = err.response;
                    this.currentStatus = STATUS_FAILED;
                });
        },
        fileChanged(fieldName, fileList) {
            const formData = new FormData();
            if (! fileList.length) {
                return
            }
            Array.from(Array(fileList.length).keys())
                 .map(x => {
                     formData.append(fieldName, fileList[x], fileList[x].name);
                 });

            this.save(formData);
        }
    },
    mounted() {
        this.reset();
    }
}
</script>
