<template>
    <div>
        <div class="switch-container flex-wrap justify-end items-center mx-auto text-center">
            <div class="w-full md:w-1/2 active-or-inactive-switch flex md:flex-1 mr-0 md:pr-1 mb-2 md:mb-0">
                <input
                        type="checkbox"
                        id="switch_left"
                        @change="toggle('activeFilter')"
                        :checked="activeFilter"
                />
                <label for="switch_left" class="shadow-sm flex-1 mr-1 py-2">Active</label>
                <input
                        type="checkbox"
                        id="switch_right"
                        class="flex-1"
                        @change="toggle('activeFilter')"
                        :checked="!activeFilter"
                />
                <label for="switch_right" class="shadow-sm flex-1 py-2">Inactive</label>
            </div>
            <div class="w-full md:w-1/2 active-or-inactive-switch flex md:flex-1 ml-0 md:pl-1 mt-1 md:mt-0">
                <input
                        type="checkbox"
                        id="switch_left_2"
                        @change="toggle('importantFilter')"
                        :checked="!importantFilter"
                />
                <label for="switch_left_2" class="shadow-sm flex-1 mr-1 py-2">All</label>
                <input
                        type="checkbox"
                        id="switch_right_2"
                        @change="toggle('importantFilter')"
                        :checked="importantFilter"
                />  
                <label for="switch_right_2" class="shadow-sm flex-1 py-2">Important</label>
            </div>



            <!--<label class="active-toggle text-white flex-grow w-8 text-right px-2"
                   :class="{ 'font-bold': activeFilter }" for="activeToggle">
                Active
            </label>
            <div class="switch-box w-8">
                <label class="sudo-switcher bg-brand-darker" :class="{ 'checked': !activeFilter }" >
                    <input
                            type="checkbox"
                            id="activeToggle"
                            :checked="!activeFilter"
                            @change="toggle('activeFilter')"
                    />
                </label>
            </div>
            <label class="active-toggle text-white flex-grow w-8 px-2" :class="{ 'font-bold': !activeFilter }"
                   for="activeToggle">
                Archived
            </label>
        </div>
        <div class="switch-container flex justify-center items-center w-full px-4 py-1">
            <label class="important-toggle text-white flex-grow w-8 text-right px-2"
                   :class="{ 'font-bold': !importantFilter }" for="importantToggle">
                All
            </label>
            <div class="switch-box w-8">
                <label class="sudo-switcher bg-brand-darker" :class="{ 'checked': importantFilter }" >
                    <input
                            type="checkbox"
                            id="importantToggle"
                            :checked="importantFilter"
                            @change="toggle('importantFilter')"
                    />
                </label>
            </div>
            <label class="important-toggle text-white flex-grow w-8 px-2" :class="{ 'font-bold': importantFilter }"
                   for="importantToggle">
                Important
            </label>-->
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            activeFilter: {
                type: Boolean,
                default: true
            },
            importantFilter: {
                type: Boolean,
                default: false
            }
        },
        methods: {
            toggle(attribute) {
                this.$emit('toggle', attribute);
            }
        }
    }
</script>

<style>
    .active-or-inactive-switch input {
        position: absolute !important;
        clip: rect(0, 0, 0, 0);
        height: 1px;
        width: 1px;
        border: 0;
        overflow: hidden;
    }

    .active-or-inactive-switch label {
        display: inline-block;
        background-color:rgba(0, 0, 0, 0.1);
        width:90px;
        font-size: 14px;
        color: rgba(0, 0, 0, 0.6);
        text-align: center;
        text-shadow: none;
        border: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-transition: all 0.15s ease-in-out;
        -moz-transition: all 0.15s ease-in-out;
        -ms-transition: all 0.15s ease-in-out;
        -o-transition: all 0.15s ease-in-out;
        transition: all 0.15s ease-in-out;
    }

    .active-or-inactive-switch label:hover {
        cursor: pointer;
    }

    .active-or-inactive-switch input:checked + label {
        background-color:#24728a;
        color:#fffdf7;
        -webkit-box-shadow: inset 0 1px     3px rgba(0, 0, 0, 0.2), 0 1px rgba(255, 255, 255, 0.1);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px rgba(255, 255, 255, 0.1);
    }

    .active-or-inactive-switch label:first-of-type {
        border-radius: .125rem 0 0 .125rem;
    }

    .active-or-inactive-switch label:last-of-type {
        border-radius: 0 .125rem .125rem 0;
    }
</style>
