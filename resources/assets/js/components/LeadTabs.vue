<template>
    <div class="w-full flex flex-wrap items-center justify-end h-32 mb-2 md:-mb-8">
        <div class="w-full flex items-center justify-end">
            <div class="w-full lg:w-1/3 flex justify-center">
                <p class="text-right text-white">Archived</p>
                    <input type="checkbox" name="active" class="toggle-switch mx-2" v-model="active" @change="onChange" :checked="active">
                <p class="text-left text-white">Active</p>
            </div>
        </div>
        <div class="w-full flex items-center justify-end">
            <div class="w-full lg:w-1/3 flex justify-center">
                <p class="text-right text-white">All Leads</p>
                    <input type="checkbox" name="important" class="toggle-switch mx-2" v-model="important" @change="onChange">
                <p class="text-left text-white">Important</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            active: true,
            important: false,
        }
    },
    methods: {
        onChange() {
            this.$emit('toggle-click', this.active, this.important);
        }
    }
}
</script>

<style>
.toggle-switch{
    width: 120px;
    position: relative;
    visibility: hidden;
}
.toggle-switch:before{
    visibility: visible;
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    position: relative;
    top: 1px;
    display: block;
    width: 90px;
    height: 30px;
    border: 1px solid #808080;
    border-radius: 50px;
    content: "";
}
.toggle-switch:after{
    visibility: visible;
    -webkit-transition: all 0.5s;
    position: absolute;
    top: 1px;
    left: 1px;
    display: block;
    width: 45px;
    height: 30px;
    border: 5px solid #ededec;
    border-radius: 50px;
    content: "";
    background: #fff;
    box-shadow: 0 2px 5px #333;
    background: #d5d4cd;
    background: -webkit-gradient(linear, 0 0, 0 100%, from(#d5d4cd), to(#f8f8f7));
    background: -webkit-linear-gradient(#d5d4cd 0%, #f8f8f7 100%);
    background: -moz-linear-gradient(#d5d4cd 0%, #f8f8f7 100%);
    background: -o-linear-gradient(#d5d4cd 0%, #f8f8f7 100%);
    background: linear-gradient(#d5d4cd 0%, #f8f8f7 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d5d4cd', endColorstr='#f8f8f7',GradientType=0 );

}
.toggle-switch:checked:before{
    position: absolute;
    display: block;
    top: 1px;
    width: 90px;
    border: 1px solid #808080;
    border-radius: 50px;
    content: "";
    background: #f08270;
}
.toggle-switch:checked:after{
    -webkit-transition: all 0.5s;
    position: absolute;
    left: 45px;
    display: block;
    border: 5px solid #ededec;
    border-radius: 50px;
    content: "";
    background: #fff;
    box-shadow: 0 2px 5px #333;
    background: #d5d4cd;
    background: -webkit-gradient(linear, 0 0, 0 100%, from(#d5d4cd), to(#f8f8f7));
    background: -webkit-linear-gradient(#d5d4cd 0%, #f8f8f7 100%);
    background: -moz-linear-gradient(#d5d4cd 0%, #f8f8f7 100%);
    background: -o-linear-gradient(#d5d4cd 0%, #f8f8f7 100%);
    background: linear-gradient(#d5d4cd 0%, #f8f8f7 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d5d4cd', endColorstr='#f8f8f7',GradientType=0 );
}
</style>

