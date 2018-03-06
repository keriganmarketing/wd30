<template>
    <div class="switch-container flex-wrap justify-end items-center mx-auto text-center">
        <div class="w-full active-or-inactive-switch flex ml-0 mb-2 md:mb-0">
            <input
                    type="checkbox"
                    id="switch_left_2"
                    @change="toggle('importantFilter')"
                    :checked="!importantFilter"
            />
            <label for="switch_left_2" class="shadow flex-1 mr-2 py-2 border border-dbblue-dark">All</label>
            <input
                    type="checkbox"
                    id="switch_right_2"
                    @change="toggle('importantFilter')"
                    :checked="importantFilter"
            />  
            <label for="switch_right_2" class="shadow flex-1 py-2 border border-dbblue-dark">Important</label>
        </div>
        <div class="w-full active-or-inactive-switch flex mr-0 mt-2">
            <input
                    type="checkbox"
                    id="switch_left"
                    @change="toggle('activeFilter')"
                    :checked="activeFilter"
            />
            <label for="switch_left" class="shadow flex-1 mr-2 py-2 border border-dbblue-dark">Actives</label>
            <input
                    type="checkbox"
                    id="switch_right"
                    @change="toggle('activeFilter')"
                    :checked="!activeFilter"
            />
            <label for="switch_right" class="shadow flex-1 py-2 border border-dbblue-dark">Inactive</label>
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
        width: 120px;
        background-color: #e4e4e4;
        color: rgba(0, 0, 0, 0.6);
        text-align: center;
        text-shadow: none;
        -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
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
        background-color: #A5DC86;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .active-or-inactive-switch label:first-of-type {
        border-radius: .125rem 0 0 .125rem;
    }

    .active-or-inactive-switch label:last-of-type {
        border-radius: 0 .125rem .125rem 0;
    }
</style>
