<script setup lang="ts">
import { ArrowUpRight, Check } from 'lucide-vue-next'
import { computed, type StyleValue } from 'vue'

interface Props {
    name: string
    tagline: string
    description: string
    image?: string
    status: 'live' | 'in-progress'
    url?: string
    role?: string
    highlights?: string[]
    ctaStyle?: StyleValue
}

const props = defineProps<Props>()

const isLive = computed(() => props.status === 'live')

const statusLabel = computed(() => (isLive.value ? 'Live' : 'In development'))

const displayUrl = computed(() =>
    (props.url ?? '').replace(/^https?:\/\//, '').replace(/\/$/, ''),
)
</script>

<template>
    <div class="flex h-full flex-col overflow-hidden rounded-4xl border-4 border-gray-200 bg-white lg:flex-row">
        <component
            :is="props.url ? 'a' : 'div'"
            :href="props.url"
            :target="props.url ? '_blank' : undefined"
            :rel="props.url ? 'noopener' : undefined"
            class="group flex flex-shrink-0 items-center bg-gradient-to-br from-purple-100 via-pink-100 to-orange-100 p-4 sm:p-6 lg:w-1/2"
        >
            <img
                v-if="props.image"
                :src="props.image"
                :alt="`Screenshot of ${props.name}`"
                class="w-full rounded-xl shadow-lg ring-1 ring-black/5 transition-transform duration-500 group-hover:scale-[1.02]"
                loading="lazy"
            />
            <div
                v-else
                class="flex w-full flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-white/90 bg-white/50 px-6 py-12 text-center sm:py-16"
            >
                <span class="funnel-display text-3xl font-bold text-gray-800 sm:text-4xl">
                    {{ props.name }}
                </span>
                <span class="text-sm font-medium text-gray-500">
                    Screenshots coming soon
                </span>
            </div>
        </component>

        <div class="flex flex-1 flex-col p-5 sm:p-6 lg:p-8">
            <div class="mb-3 flex flex-wrap items-center gap-x-3 gap-y-1">
                <span
                    class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-0.5 text-xs font-semibold"
                    :class="isLive ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'"
                >
                    <span class="relative flex h-2 w-2">
                        <span
                            v-if="isLive"
                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"
                        ></span>
                        <span
                            class="relative inline-flex h-2 w-2 rounded-full"
                            :class="isLive ? 'bg-emerald-500' : 'bg-amber-500'"
                        ></span>
                    </span>
                    {{ statusLabel }}
                </span>

                <span v-if="props.role" class="text-xs font-medium text-gray-500">
                    {{ props.role }}
                </span>
            </div>

            <h3 class="funnel-display text-2xl font-bold text-gray-800 sm:text-3xl">
                {{ props.name }}
            </h3>

            <p class="mt-1 font-medium text-gray-600">
                {{ props.tagline }}
            </p>

            <p class="mt-4 text-sm leading-relaxed text-gray-700">
                {{ props.description }}
            </p>

            <ul v-if="props.highlights?.length" class="mt-4 space-y-2">
                <li
                    v-for="highlight in props.highlights"
                    :key="highlight"
                    class="flex items-start gap-2 text-sm text-gray-700"
                >
                    <Check class="mt-0.5 h-4 w-4 flex-shrink-0 text-emerald-500" />
                    <span>{{ highlight }}</span>
                </li>
            </ul>

            <div class="mt-6 flex flex-wrap items-center justify-between gap-4 lg:mt-auto lg:pt-6">
                <div class="flex flex-wrap gap-1">
                    <slot name="tech-tags"></slot>
                </div>

                <a
                    v-if="props.url"
                    :href="props.url"
                    target="_blank"
                    rel="noopener"
                    class="gradient-animation inline-flex w-full flex-shrink-0 rounded-full p-[2px] sm:w-auto"
                    :style="props.ctaStyle"
                >
                    <span class="inline-flex w-full min-w-max items-center justify-center gap-1.5 rounded-full px-4 py-2 text-sm font-bold text-white sm:px-6 sm:py-2.5 sm:text-base">
                        Visit {{ displayUrl }}
                        <ArrowUpRight class="h-4 w-4" />
                    </span>
                </a>
            </div>
        </div>
    </div>
</template>
