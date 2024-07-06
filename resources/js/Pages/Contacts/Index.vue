<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, router, usePage} from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";


const { props } = usePage();

function deleteContact(contactId) {
    if (confirm('Are you sure you want to delete this contact?')) {
        // Make a DELETE request to the delete route
        // Replace '/contacts/:id' with the actual delete route URL
        // Replace 'contactId' with the actual contact ID
        // Example: Inertia.delete('/contacts/' + contactId)
        router.delete('/contacts/' + contactId)
        // Inertia.delete('/contacts/' + contactId)
        //     .then(() => {
        //         // Handle success response
        //         // Update the contacts list or remove the deleted contact from the props
        //         // Example: props.value.contacts = props.value.contacts.filter(contact => contact.id !== contactId)
        //     })
        //     .catch(() => {
        //         // Handle error response
        //         // Display an error message or perform any necessary actions
        //     });
    }
}

</script>

<script>
export default {
    props: {
        contacts: Array,
    },
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link :href="route('contacts.create')" class="inline-block px-4 px-3 bg-blue-500 text-white rounded mb-4">
                    Add new Contact
                </Link>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-gray-900">

                    <ul class="p-6">
                        <li class="mt-2" v-for="contact in contacts" :key="contact.id">
                            {{ contact.name }} - {{ contact.phone }}
                            <Link :href="route('contacts.edit', contact.id)" class="ml-5 bg-blue-600 px-4 py-2 rounded text-white" >Edit</Link>
                            <PrimaryButton @click="deleteContact(contact.id)" class="ml-5">Delete</PrimaryButton>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>

</style>
