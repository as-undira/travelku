<script setup>
import {
    Link,
    useForm,
} from '@inertiajs/vue3'

const props =
    defineProps({
        schedule: Object,
        packages: Array,
    })

const form =
    useForm({
        package_id:
            props.schedule.package_id,

        departure_date:
            props.schedule.departure_date
                ?.slice(0, 16),

        quota:
            props.schedule.quota,

        remaining_quota:
            props.schedule
                .remaining_quota,
    })

function submit() {
    form.put(
        route(
            'admin.schedules.update',
            props.schedule.id
        )
    )
}
</script>

<template>
<div class="min-h-screen bg-slate-100">

    <div
        class="
            mx-auto
            max-w-5xl
            px-6
            py-10
        "
    >

        <Link
            :href="
                route(
                    'admin.schedules.index'
                )
            "
            class="
                mb-8
                inline-block
                text-blue-600
            "
        >
            ← Kembali
        </Link>

        <div
            class="
                rounded-3xl
                bg-white
                p-8
                shadow-xl
            "
        >
            <h1
                class="
                    mb-8
                    text-4xl
                    font-bold
                "
            >
                Edit Jadwal
            </h1>

            <!-- isi form sama seperti Create -->

            <!-- tambahkan -->

            <div
                class="
                    mt-6
                "
            >
                <label
                    class="
                        mb-2
                        block
                        font-semibold
                    "
                >
                    Sisa Kuota
                </label>

                <input
                    type="number"
                    v-model="
                        form.remaining_quota
                    "
                    class="
                        w-full
                        rounded-2xl
                        border-slate-300
                    "
                >
            </div>

            <div
                class="
                    mt-8
                    flex
                    justify-end
                "
            >
                <button
                    @click="
                        submit
                    "
                    class="
                        rounded-2xl
                        bg-blue-600
                        px-8
                        py-4
                        text-white
                    "
                >
                    Update Jadwal
                </button>
            </div>

        </div>

    </div>

</div>
</template>