<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const aux_histories = ref();
const createNewUser = ref(false);
const menu = ref();

onMounted(() => {
    axios.get('/api/aux-history')
        .then(response => (aux_histories.value = response.data))
        .catch(error => console.error(error))
});

const items = ref([
    {
        label: 'Delete',
        icon: 'pi pi-fw pi-trash'
    },
    {
        label: 'Edit',
        icon: 'pi pi-fw pi-pencil'
    },
]);

const toggle = (event) => {
    menu.value.toggle(event);
};
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

                        <template #end>
                            <Button label="Export" icon="pi pi-upload" severity="help" @click="exportCSV($event)"  />
                        </template>

                    </Toolbar>

                    <DataTable :value="aux_histories" paginator showGridlines :rows="10" :rowsPerPageOptions="[5, 10, 20, 50]" tableStyle="min-width: 50rem">
                        
                        <Column field="name" header="Name" style="width: 25%"></Column>
                        <Column field="aux_type" header="Aux Type" style="width: 25%"></Column>
                        <Column field="aux_created_at" header="Time Enter" style="width: 25%"></Column>
                        <Column field="id" header="Action" style="width: 25%">
                            <template #body="{ data }">
                                <Button type="button" label="Toggle" @click="toggle" aria-haspopup="true" :aria-controls="`ref_${data.id}`" />
                                <TieredMenu ref="menu" :id="`ref_${data.id}`" :model="items" popup />
                            </template>
                        </Column>
                        
                    </DataTable>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>  
</template>