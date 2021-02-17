<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories

                <div class="float-right">
                    <jet-nav-link :href="create_url">
                        Create
                    </jet-nav-link>
                </div>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Id</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Created At</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Updated At</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Options</th>
                            </tr>
                            </thead>
                        <tbody class="text-gray-700">
                            <tr v-for="category in categories.data" v-bind:key="category.id">
                            <td class="text-left py-3 px-4">{{ category.id }}</td>
                            <td class="text-left py-3 px-4">{{ category.title }}</td>
                            <td class="text-left py-3 px-4">{{ category.description }}</td>
                            <td class="text-left py-3 px-4">{{ category.created_at }}</td>
                            <td class="text-left py-3 px-4">{{ category.updated_at }}</td>
                            <td class="text-left py-3 px-4">
                                <jet-nav-link :href="category.edit_url">
                                    Edit
                                </jet-nav-link>

                                <button @click="remove(category)">
                                    Delete
                                </button>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="py-2 flex justify-center" v-if="categories.meta.last_page > 1">
            <jet-nav-link :href="categories.links.prev" :disabled="!categories.links.prev">
                Previous
            </jet-nav-link>
            Page: {{ categories.meta.current_page}} / {{ categories.meta.last_page }}
            <jet-nav-link :href="categories.links.next" :disabled="!categories.links.next">
                Next
            </jet-nav-link>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetNavLink from '@/Jetstream/NavLink'

    export default {
        components: {
            AppLayout,
            JetNavLink,
        },

        props: ['create_url', 'categories'],

        methods: {
            remove(item) {
                this.$inertia.form().delete(item.delete_url);
            }
        }
    }
</script>
