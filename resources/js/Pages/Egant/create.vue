<script setup>
    import { ref, onMounted } from 'vue';
    const userDialog = ref(true);
</script>

<template>
        <Dialog v-model:visible="userDialog" :style="{width: '450px'}" header="Product Details" :modal="true" class="p-fluid">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <template #footer>
            <Button label="No" icon="pi pi-times" @click="visible = false" text />
            <Button label="Yes" icon="pi pi-check" @click="visible = false" autofocus />
        </template>
    </Dialog>
</template>