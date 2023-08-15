<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Clock from '@/Components/Clock.vue';
import { ref } from "vue";

/* ------------------------
| 
---------------------------*/
const selectedEID = ref();
const eids = ref([
    {
        name : 'John Paul',
        id   : 'SA150003',
    },{
        name : 'Rob',
        id   : 'SA150001'
    }
])

const selectedAUX = ref();
const auxs = ref([
    {
        name : 'Time In',
        id   : '1',
    },{
        name : 'Time Out',
        id   : '2'
    },{
        name : 'Break / Luanch',
        id   : '2'
    },{
        name : 'First 15 mins',
        id   : '2'
    },{
        name : 'Second 15 mins',
        id   : '2'
    }
])

/* ------------------------
| Function
---------------------------*/
</script>

<template>
    <GuestLayout>
    
        <Clock :class="'mt-80'" />
        
        <div class="flex flex-col">
            <div class="flex justify-center items-center text-5xl mt-5">
                <div class="w-1/6 mr-2">
                    <Dropdown v-model="selectedEID" size="large" :options="eids" optionLabel="name" placeholder="Select a EID" class="w-full">
                        <template #value="slotProps">

                            <div v-if="slotProps.value" class="flex align-items-center">
                                <div>{{ slotProps.value.id }} - {{ slotProps.value.name }}</div>
                            </div>
                        </template>
                        <template #option="slotProps">
                        

                            <div class="flex align-items-center">
                                <div>{{ slotProps.option.id }} - {{ slotProps.option.name }}</div>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <div class="w-1/6 mr-2">
                    <Dropdown v-model="selectedAUX" size="large" :options="auxs" optionLabel="name" placeholder="Select a EID" class="w-full">
                        <template #value="slotProps">

                            <div v-if="slotProps.value" class="flex align-items-center">
                                <div>{{ slotProps.value.name }}</div>
                            </div>
                        </template>
                        <template #option="slotProps">
                        

                            <div class="flex align-items-center">
                                <div>{{ slotProps.option.name }}</div>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <div class="mr-10 mt-2">
                    <Button label="Submit" />
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="flex justify-center items-center text-5xl mt-5">
                <div class="mr-10">
                    <Button label="Report Problem" severity="danger" />
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
