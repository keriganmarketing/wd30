<template>
    <div class="container mx-auto">
        <lead-tabs
            @toggle-click="fetch"
        />
        <lead-pagination
            @page="page"
            :pagination="pagination"
        />
        <transition-group name="slide" tag="div">
            <lead
                v-for="lead in leads"
                :key="lead.id"
                :lead="lead"
                :view-active-leads="viewActive"
                :view-important-leads="viewImportant"
                :current-page="pagination.current_page"
                @archived="fetch"
                @unarchived="fetch"
                @important="fetch"
            />
        </transition-group>
        <lead-pagination
            @page="page"
            :pagination="pagination"
        />
    </div>

</template>

<script>
class Pagination {
    constructor(data) {
        for (let field in data) {
            this[field] = data[field];
        }
    }
}
export default {
    data() {
        return {
            pagination: new Pagination({
                next_page_url: '',
                prev_page_url: '',
                from: '',
                to: '',
                last_page: '',
                current_page: '',
                total: ''
            }),
            leads:  [],
            viewActive: true,
            viewImportant: false,
            base: '/leads?'
        }
    },
    mounted () {
        this.fetch();
    },
    methods: {
        fetch (active = this.viewActive, important = this.viewImportant, page = 1) {
            this.viewActive = active;
            this.viewImportant = important;
            axios.get(
                this.base +
                'active=' + active +
                '&important=' + important +
                '&page=' + page
            )
                .then(response => {
                    this.pagination = response.data;
                    this.leads = response.data.data;
                });
            this.$emit('update-leads-count');
        },
        page(page) {
            axios.get(page)
                .then(response => {
                    this.pagination = response.data;
                    this.leads = response.data.data;
                })
        }
    }
}
</script>

<style>
.slide-move {
    transition: transform .5s;
}
.slide-enter-active {
  transition: all .3s ease;
}
.slide-leave-active {
    position: absolute;
    transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-enter, .slide-leave-to{
    opacity: 0;
    transform: translateX(100px);
}
</style>

