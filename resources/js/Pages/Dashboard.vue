<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Clock from '@/Components/Clock.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import moment from 'moment'
import { useToast } from "primevue/usetoast";

const toast = useToast();

onMounted(() => {
    axios.get('/api/egants')
        .then(response => (eids.value = response.data))
        .catch(error => console.error(error))

    axios.get('/api/aux-types')
        .then(response => (auxs.value = response.data))
        .catch(error => console.error(error))
});

const selectedEID = ref();
const eids = ref();

const selectedAUX = ref();
const auxs = ref();

function submit() {
    axios.post('/api/aux-history', {
        'aux_created_at' : moment().format("YYYY-MM-DD HH:mm:ss"),
        'user_id' : selectedEID.value.id,
        'aux_type' : selectedAUX.value.aux_type
    }).then((response) => {

        toast.add({ 
            severity: 'success', 
            summary: `Success IN ${selectedAUX.value.aux_type} At ${moment().format('H')} Hours ${moment().format('m')} Minute ${moment().format('s')} Second` , 
            detail: 'Message Content', 
            group: 'br', 
            life: 3000 
        });
        
    }).catch((error) => {
        
        toast.add({
            severity: "warn",
            summary: "Something Warn",
            detail: "Message Content",
            group: "br",
            life: 3000,
        });
    })
}

const successMessage = () => {
}

</script>

<template>

    <GuestLayout v-if="$page.props.auth.user === null">
        <Toast position="bottom-right" group="br" />
        <Clock :class="'mt-80'" />
        
        <div class="flex flex-col">
            <div class="flex justify-center items-center text-5xl mt-5">
                <div class="w-1/6 mr-2">
                    <Dropdown v-model="selectedEID" size="large" :options="eids" optionLabel="name" placeholder="Select a EID" class="w-full">
                        <template #value="slotProps">

                            <div v-if="slotProps.value" class="flex align-items-center">
                                <div>{{ slotProps.value.eid }} - {{ slotProps.value.name }}</div>
                            </div>
                        </template>
                        <template #option="slotProps">
                        

                            <div class="flex align-items-center">
                                <div>{{ slotProps.option.eid }} - {{ slotProps.option.name }}</div>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <div class="w-1/6 mr-2">
                    <Dropdown v-model="selectedAUX" size="large" :options="auxs" optionLabel="name" placeholder="Select a EID" class="w-full">
                        <template #value="slotProps">

                            <div v-if="slotProps.value" class="flex align-items-center">
                                <div>{{ slotProps.value.aux_type }}</div>
                            </div>
                        </template>
                        <template #option="slotProps">
                        

                            <div class="flex align-items-center">
                                <div>{{ slotProps.option.aux_type }}</div>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <div class="mr-10 mt-2">
                    <Button label="Submit" @click="submit" />
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

    <AuthenticatedLayout v-if="$page.props.auth.user !== null">
        <Toast position="bottom-right" group="br" />
        <Clock :class="'mt-80'" />
        
        <div class="flex flex-col">
            <div class="flex justify-center items-center text-5xl mt-5">
                <div class="w-1/6 mr-2">
                    <Dropdown v-model="selectedEID" size="large" :options="eids" optionLabel="name" placeholder="Select a EID" class="w-full">
                        <template #value="slotProps">

                            <div v-if="slotProps.value" class="flex align-items-center">
                                <div>{{ slotProps.value.eid }} - {{ slotProps.value.name }}</div>
                            </div>
                        </template>
                        <template #option="slotProps">
                        

                            <div class="flex align-items-center">
                                <div>{{ slotProps.option.eid }} - {{ slotProps.option.name }}</div>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <div class="w-1/6 mr-2">
                    <Dropdown v-model="selectedAUX" size="large" :options="auxs" optionLabel="name" placeholder="Select a EID" class="w-full">
                        <template #value="slotProps">

                            <div v-if="slotProps.value" class="flex align-items-center">
                                <div>{{ slotProps.value.aux_type }}</div>
                            </div>
                        </template>
                        <template #option="slotProps">
                        

                            <div class="flex align-items-center">
                                <div>{{ slotProps.option.aux_type }}</div>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <div class="mr-10 mt-2">
                    <Button label="Submit" @click="submit" />
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
    </AuthenticatedLayout>
</template>
