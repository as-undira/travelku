<script setup>
import {
    computed,
} from 'vue'

import {
    Link,
    useForm,
} from '@inertiajs/vue3'

const props = defineProps({
    packages: Array,
})

const form = useForm({
    package_id: '',
    departure_date: '',
    quota: '',
    remaining_quota: '',
})

function submit() {
    form.remaining_quota =
        form.quota

    form.post(
        route(
            'admin.schedules.store'
        )
    )
}

const selectedPackage =
    computed(() => {
        return props.packages.find(
            p =>
                p.id ==
                form.package_id
        )
    })
</script>

<template>
<div class="min-h-screen bg-slate-100">

    <!-- Hero -->
    <section
        class="
            bg-gradient-to-r
            from-blue-700
            via-sky-500
            to-cyan-400
        "
    >
        <div
            class="
                mx-auto
                max-w-5xl
                px-6
                py-14
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
                    inline-flex
                    rounded-xl
                    bg-white/10
                    px-5
                    py-2
                    text-white
                    backdrop-blur
                "
            >
                ← Kembali
            </Link>

            <h1
                class="
                    text-5xl
                    font-bold
                    text-white
                "
            >
                Tambah Jadwal
            </h1>

            <p
                class="
                    mt-4
                    text-xl
                    text-blue-100
                "
            >
                Tambahkan jadwal
                keberangkatan baru.
            </p>

        </div>
    </section>

    <div
        class="
            mx-auto
            -mt-8
            max-w-5xl
            px-6
            pb-16
        "
    >
        <div
            class="
                rounded-3xl
                bg-white
                p-8
                shadow-xl
            "
        >

            <!-- Paket -->
            <div>

                <label
                    class="
                        mb-2
                        block
                        font-semibold
                    "
                >
                    Paket Wisata
                </label>

                <select
                    v-model="
                        form.package_id
                    "
                    class="
                        w-full
                        rounded-2xl
                        border-slate-300
                    "
                >
                    <option value="">
                        Pilih Paket
                    </option>

                    <option
                        v-for="
                            item in packages
                        "
                        :key="
                            item.id
                        "
                        :value="
                            item.id
                        "
                    >
                        {{
                            item.name
                        }}
                    </option>

                </select>

            </div>

            <!-- Tanggal -->
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
                    Jadwal
                    Keberangkatan
                </label>

                <input
                    type="datetime-local"
                    v-model="
                        form.departure_date
                    "
                    class="
                        w-full
                        rounded-2xl
                        border-slate-300
                    "
                >
            </div>

            <!-- Kuota -->
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
                    Kuota Peserta
                </label>

                <input
                    type="number"
                    v-model="
                        form.quota
                    "
                    class="
                        w-full
                        rounded-2xl
                        border-slate-300
                    "
                >
            </div>

            <!-- Preview -->
            <div
                v-if="
                    selectedPackage
                "
                class="
                    mt-8
                    rounded-3xl
                    bg-slate-50
                    p-6
                "
            >
                <h3
                    class="
                        text-xl
                        font-bold
                    "
                >
                    Preview
                </h3>

                <div
                    class="
                        mt-4
                        space-y-2
                        text-gray-600
                    "
                >
                    <p>
                        Paket :
                        <b>
                            {{
                                selectedPackage.name
                            }}
                        </b>
                    </p>

                    <p>
                        Destinasi :
                        {{
                            selectedPackage.destination
                        }}
                    </p>

                    <p
                        v-if="
                            form.departure_date
                        "
                    >
                        Tanggal :

                        {{
                            new Date(
                                form.departure_date
                            ).toLocaleString(
                                'id-ID',
                                {
                                    weekday:
                                        'long',
                                    day:
                                        'numeric',
                                    month:
                                        'long',
                                    year:
                                        'numeric',
                                    hour:
                                        '2-digit',
                                    minute:
                                        '2-digit',
                                }
                            )
                        }}
                    </p>

                    <p>
                        Kuota :
                        {{
                            form.quota
                        }}
                        Peserta
                    </p>
                </div>

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
                        font-semibold
                        text-white
                    "
                >
                    Simpan Jadwal
                </button>
            </div>

        </div>
    </div>

</div>
</template>