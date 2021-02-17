<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Category
            </h2>
        </template>

        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
        role="alert" v-if="$page.props.flash.message">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ $page.props.flash.message }}</p>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

<jet-form-section @submitted="update">
    <template #form>
        <!-- Title -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="title" value="Title" />
            <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" />
            <jet-input-error :message="form.errors.title" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="description" value="Description" />
            <jet-input id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
        </div>
    </template>

    <template #actions>
        <jet-button>
            Save
        </jet-button>
    </template>
</jet-form-section>

            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        props: ['category'],

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    title: this.category.data.title,
                    description: this.category.data.description
                }),
            }
        },

        methods: {
            update() {
                this.form.put(this.category.data.update_url, {
                    errorBag: 'createCategory',
                    preserveScroll: true
                });
            },
        },
    }
</script>
