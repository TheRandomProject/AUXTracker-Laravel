<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateModal from './create.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const customers = ref();
const createNewUser = ref(false);

onMounted(() => {
    axios.get('/api/egants')
        .then(response => (customers.value = response.data))
        .catch(error => console.error(error))
});

const openNew = () => {
    createNewUser.value = true;
}

</script>

<template>
    <Head title="Egant" />
    <AuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Egant</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px8">
                <div class="card">
                    <Toolbar class="mb-4">

                        <template #start>
                            <Button label="New" icon="pi pi-plus" severity="success" class="mr-2" @click="openNew" />
                        </template>

                        <template #end>
                            <Button label="Export" icon="pi pi-upload" severity="help" @click="exportCSV($event)"  />
                        </template>

                    </Toolbar>

                    <DataTable :value="customers" paginator showGridlines :rows="10" :rowsPerPageOptions="[5, 10, 20, 50]" tableStyle="min-width: 50rem">
                        
                        <Column field="eid" header="EID" style="width: 25%"></Column>
                        <Column field="name" header="Name" style="width: 25%"></Column>
                        <Column field="email" header="Email" style="width: 25%"></Column>
                        
                    </DataTable>
                </div>
            </div>
        </div>

        <CreateModal v-if="createNewUser" />

    </AuthenticatedLayout>  
</template>