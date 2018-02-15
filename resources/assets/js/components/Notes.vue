<template>
    <div class="text-grey-darkest flex flex-wrap justify-start lg:p-8 border-t w-full">
        <div class="w-full mb-8 flex flex-wrap items-start">
            <span class="block w-full mb-1"><strong>Add a note:</strong></span>
            <div class="w-full md:w-1/2">
                <textarea rows="4" v-model="newNote" class="border rounded-t shadow-inner p-4 w-full"></textarea>
                <button class="bg-teal text-white px-8 py-2 rounded-b w-full" @click="addNote">Submit</button>
            </div>
        </div>
        <note v-for="note in notes" :key="note.id" :note="note"></note>
    </div>
</template>

<script>
export default {
    props: ['notes', 'lead'],
    data () {
        return {
            newNote: ''
        }
    },
    methods: {
        addNote() {
            axios({
                method: 'post',
                url: '/notes',
                data: {
                    lead_id: this.lead.id,
                    message: this.newNote
                }
            })
                .then(response => {
                    this.$emit('note-added', this.lead.id);
                    this.newNote = '';
                })
        }
    }
}
</script>
