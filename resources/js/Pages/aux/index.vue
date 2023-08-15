<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const aux_histories = ref();
const createNewUser = ref(false);

onMounted(() => {
    axios.get('/api/aux-history')
        .then(response => (aux_histories.value = response.data))
        .catch(error => console.error(error))
});

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
                        
                    </DataTable>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>  
</template>