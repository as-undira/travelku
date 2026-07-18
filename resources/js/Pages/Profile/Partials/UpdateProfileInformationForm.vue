<script setup>
import { computed } from 'vue'

import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'

import {
    Link,
    useForm,
    usePage,
} from '@inertiajs/vue3'

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
})

const page = usePage()

const user = computed(() => {
    return (
        page.props.auth?.user ??
        {}
    )
})

const form = useForm({
    name:
        user.value.name ?? '',

    email:
        user.value.email ?? '',

    phone:
        user.value.phone ?? '',

    gender:
        user.value.gender ?? '',

    birth_date:
        user.value.birth_date ??
        '',
})
</script>

<template>
<section>

    <header>

        <h2
            class="
                text-lg
                font-medium
                text-gray-900
            "
        >
            Profile Information
        </h2>

        <p
            class="
                mt-1
                text-sm
                text-gray-600
            "
        >
            Update your profile information.
        </p>

    </header>

    <form
        class="
            mt-6
            space-y-6
        "
        @submit.prevent="
            form.patch(
                route(
                    'profile.update'
                )
            )
        "
    >

        <div>

            <InputLabel
                value="Name"
            />

            <TextInput
                v-model="
                    form.name
                "
                class="
                    mt-1
                    block
                    w-full
                "
            />

            <InputError
                :message="
                    form.errors.name
                "
            />

        </div>

        <div>

            <InputLabel
                value="Email"
            />

            <TextInput
                type="email"
                v-model="
                    form.email
                "
                class="
                    mt-1
                    block
                    w-full
                "
            />

            <InputError
                :message="
                    form.errors.email
                "
            />

        </div>

        <div>

            <InputLabel
                value="Phone"
            />

            <TextInput
                v-model="
                    form.phone
                "
                class="
                    mt-1
                    block
                    w-full
                "
            />

            <InputError
                :message="
                    form.errors.phone
                "
            />

        </div>

        <div>

            <InputLabel
                value="Gender"
            />

            <select
                v-model="
                    form.gender
                "
                class="
                    mt-1
                    block
                    w-full
                    rounded-md
                    border-gray-300
                "
            >
                <option value="">
                    Pilih Gender
                </option>

                <option value="L">
                    Laki-Laki
                </option>

                <option value="P">
                    Perempuan
                </option>
            </select>

            <InputError
                :message="
                    form.errors.gender
                "
            />

        </div>

        <div>

            <InputLabel
                value="
                    Tanggal Lahir
                "
            />

            <TextInput
                type="date"
                v-model="
                    form.birth_date
                "
                class="
                    mt-1
                    block
                    w-full
                "
            />

            <InputError
                :message="
                    form.errors
                        .birth_date
                "
            />

        </div>

        <div
            v-if="
                mustVerifyEmail &&
                user
                    ?.email_verified_at ===
                    null
            "
        >
            <p
                class="
                    text-sm
                    text-gray-800
                "
            >
                Your email address
                is unverified.

                <Link
                    :href="
                        route(
                            'verification.send'
                        )
                    "
                    method="post"
                    as="button"
                    class="
                        underline
                    "
                >
                    Resend Verification
                </Link>

            </p>
        </div>

        <div
            class="
                flex
                items-center
                gap-4
            "
        >

            <PrimaryButton
                :disabled="
                    form.processing
                "
            >
                Save
            </PrimaryButton>

            <Transition
                enter-active-class="
                    transition
                "
                leave-active-class="
                    transition
                "
            >
                <p
                    v-if="
                        form.recentlySuccessful
                    "
                    class="
                        text-sm
                        text-gray-600
                    "
                >
                    Saved.
                </p>
            </Transition>

        </div>

    </form>

</section>
</template>