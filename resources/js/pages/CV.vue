<script setup lang="ts">
import ScreenSection from '@/components/ScreenSection.vue'
import { ChevronDown } from 'lucide-vue-next'
import { ref, onBeforeUnmount } from 'vue'

interface CvSection {
    id: number
    key: string
    title: string
    content: Record<string, unknown>
    sort_order: number
    gradient_from: string
    gradient_via: string
    gradient_to: string
}

const props = defineProps<{
    sections: CvSection[]
}>()

let experienceEl: HTMLElement | null = null
const atBottom = ref(false)

function checkScrollPosition() {
    if (!experienceEl) return
    atBottom.value = Math.abs(experienceEl.scrollHeight - experienceEl.clientHeight - experienceEl.scrollTop) < 10
}

function experienceRef(el: any) {
    if (experienceEl) {
        experienceEl.removeEventListener('scroll', checkScrollPosition)
    }
    experienceEl = el as HTMLElement | null
    if (experienceEl) {
        experienceEl.addEventListener('scroll', checkScrollPosition)
        checkScrollPosition()
    }
}

function onChevronClick() {
    if (!experienceEl) return
    if (atBottom.value) {
        experienceEl.scrollTo({ top: 0, behavior: 'smooth' })
    } else {
        experienceEl.scrollBy({ top: 300, behavior: 'smooth' })
    }
}

onBeforeUnmount(() => {
    experienceEl?.removeEventListener('scroll', checkScrollPosition)
})

const navItems = props.sections.map((s) => ({
    label: s.key === 'hero' ? 'Home' : s.title,
    href: `#${s.key}`,
}))
</script>

<template>
    <nav
        class="fixed left-1/2 top-3 z-50 -translate-x-1/2 transform rounded-full bg-white/90 px-4 py-3 shadow-2xl backdrop-blur-md sm:top-6 sm:px-8 sm:py-4"
    >
        <ul class="flex space-x-4 text-xs font-semibold sm:space-x-8 sm:text-sm">
            <li v-for="item in navItems" :key="item.href">
                <a
                    :href="item.href"
                    class="funnel-display text-gray-700 transition-colors hover:text-purple-600"
                >
                    {{ item.label }}
                </a>
            </li>
        </ul>
    </nav>

    <template v-for="section in sections" :key="section.key">
        <!-- Hero Section -->
        <ScreenSection
            v-if="section.key === 'hero'"
            :id="section.key"
            :from="section.gradient_from"
            :via="section.gradient_via"
            :to="section.gradient_to"
        >
            <div class="flex flex-col items-center gap-6 text-center sm:gap-8 lg:gap-10">
                <h1
                    class="funnel-display text-3xl font-bold text-white sm:text-4xl md:text-5xl lg:text-6xl"
                >
                    {{ section.title }}
                </h1>
                <p
                    v-if="(section.content as any).subtitle"
                    class="text-xl text-white/90 sm:text-2xl md:text-3xl"
                >
                    {{ (section.content as any).subtitle }}
                </p>
                <p
                    v-if="(section.content as any).location"
                    class="text-base text-white/70 sm:text-lg"
                >
                    {{ (section.content as any).location }}
                </p>
                <p
                    v-if="(section.content as any).summary"
                    class="mx-auto max-w-xs px-4 text-base text-white sm:max-w-sm sm:text-lg md:max-w-md md:text-xl lg:max-w-lg xl:max-w-xl"
                >
                    {{ (section.content as any).summary }}
                </p>
            </div>
        </ScreenSection>

        <!-- Experience Section -->
        <ScreenSection
            v-else-if="section.key === 'experience'"
            :id="section.key"
            :from="section.gradient_from"
            :via="section.gradient_via"
            :to="section.gradient_to"
        >
            <h2
                class="funnel-display mb-6 text-center text-2xl font-bold text-white sm:mb-8 sm:text-3xl md:mb-10 md:text-4xl lg:mb-12 lg:text-5xl"
            >
                {{ section.title }}
            </h2>
            <div :ref="experienceRef" class="mx-auto max-w-4xl space-y-8 px-4 sm:space-y-10 overflow-y-auto max-h-[calc(100vh-24rem)]">
                <div
                    v-for="(employer, i) in (section.content as any).employers"
                    :key="i"
                    class="rounded-2xl bg-white/10 p-6 backdrop-blur-sm sm:p-8"
                >
                    <div class="mb-4 flex flex-col sm:flex-row sm:items-baseline sm:justify-between">
                        <h3 class="funnel-display text-lg font-bold text-white sm:text-xl">
                            {{ employer.role }}
                            <span class="text-white/80">&mdash; {{ employer.company }}</span>
                        </h3>
                        <span class="mt-1 text-sm text-white/60 sm:mt-0">{{ employer.period }}</span>
                    </div>

                    <p class="text-sm text-white/90 sm:text-base">{{ employer.summary }}</p>

                    <div v-if="employer.projects?.length" class="mt-6 space-y-5">
                        <div
                            v-for="(project, j) in employer.projects"
                            :key="j"
                            class="border-l-2 border-white/20 pl-4"
                        >
                            <h4 class="funnel-display font-semibold text-white">
                                {{ project.name }}
                                <span class="ml-2 text-sm font-normal text-white/60">{{ project.period }}</span>
                            </h4>
                            <p class="mt-1 text-sm text-white/70">{{ project.description }}</p>
                            <ul v-if="project.bullets?.length" class="mt-2 space-y-1">
                                <li
                                    v-for="(bullet, k) in project.bullets"
                                    :key="k"
                                    class="flex items-start gap-2 text-sm text-white/90"
                                >
                                    <span class="mt-1.5 h-1.5 w-1.5 flex-shrink-0 rounded-full bg-white/50"></span>
                                    {{ bullet }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex justify-center">
                <ChevronDown
                    class="h-8 w-8 animate-bounce text-white/60 transition-transform duration-300 cursor-pointer hover:text-white/90"
                    :class="atBottom ? 'rotate-180' : ''"
                    @click="onChevronClick"
                />
            </div>
        </ScreenSection>

        <!-- Skills Section -->
        <ScreenSection
            v-else-if="section.key === 'skills'"
            :id="section.key"
            :from="section.gradient_from"
            :via="section.gradient_via"
            :to="section.gradient_to"
        >
            <h2
                class="funnel-display mb-6 text-center text-2xl font-bold text-white sm:mb-8 sm:text-3xl md:mb-10 md:text-4xl lg:mb-12 lg:text-5xl"
            >
                {{ section.title }}
            </h2>
            <div
                class="mx-auto grid max-w-4xl grid-cols-1 gap-6 px-4 sm:grid-cols-2 lg:grid-cols-3"
            >
                <div
                    v-for="(group, i) in (section.content as any).groups"
                    :key="i"
                    class="rounded-2xl bg-white/10 p-6 backdrop-blur-sm"
                >
                    <h3 class="funnel-display mb-3 text-lg font-bold text-white">
                        {{ group.name }}
                    </h3>
                    <ul class="space-y-1">
                        <li
                            v-for="(item, j) in group.items"
                            :key="j"
                            class="text-sm text-white/90"
                        >
                            {{ item }}
                        </li>
                    </ul>
                </div>
            </div>
        </ScreenSection>

        <!-- Testimonials Section -->
        <ScreenSection
            v-else-if="section.key === 'testimonials'"
            :id="section.key"
            :from="section.gradient_from"
            :via="section.gradient_via"
            :to="section.gradient_to"
        >
            <h2
                class="funnel-display mb-6 text-center text-2xl font-bold text-white sm:mb-8 sm:text-3xl md:mb-10 md:text-4xl lg:mb-12 lg:text-5xl"
            >
                {{ section.title }}
            </h2>
            <div class="mx-auto max-w-4xl space-y-6 px-4 sm:space-y-8">
                <div
                    v-for="(quote, i) in (section.content as any).quotes"
                    :key="i"
                    class="rounded-2xl bg-white/10 p-6 backdrop-blur-sm sm:p-8"
                >
                    <p class="text-base italic text-white/90 sm:text-lg">
                        &ldquo;{{ quote.text }}&rdquo;
                    </p>
                    <p class="mt-4 text-sm font-semibold text-white">
                        {{ quote.author }}
                        <span class="font-normal text-white/60">&mdash; {{ quote.role }}</span>
                    </p>
                </div>
            </div>
        </ScreenSection>

        <!-- Education Section -->
        <ScreenSection
            v-else-if="section.key === 'education'"
            :id="section.key"
            :from="section.gradient_from"
            :via="section.gradient_via"
            :to="section.gradient_to"
        >
            <h2
                class="funnel-display mb-6 text-center text-2xl font-bold text-white sm:mb-8 sm:text-3xl md:mb-10 md:text-4xl lg:mb-12 lg:text-5xl"
            >
                {{ section.title }}
            </h2>
            <div class="mx-auto max-w-3xl space-y-6 px-4">
                <div
                    v-for="(qual, i) in (section.content as any).qualifications"
                    :key="i"
                    class="rounded-2xl bg-white/10 p-6 backdrop-blur-sm sm:p-8"
                >
                    <h3 class="funnel-display text-lg font-bold text-white sm:text-xl">
                        {{ qual.degree }}
                    </h3>
                    <p class="mt-1 text-sm text-white/80 sm:text-base">
                        {{ qual.institution }}
                        <span v-if="qual.year" class="ml-2 text-white/60">{{ qual.year }}</span>
                    </p>
                    <p v-if="qual.details" class="mt-3 text-sm text-white/90 sm:text-base">
                        {{ qual.details }}
                    </p>
                </div>
            </div>
        </ScreenSection>

        <!-- Fallback for unknown section types -->
        <ScreenSection
            v-else
            :id="section.key"
            :from="section.gradient_from"
            :via="section.gradient_via"
            :to="section.gradient_to"
        >
            <h2
                class="funnel-display mb-6 text-center text-2xl font-bold text-white sm:mb-8 sm:text-3xl md:mb-10 md:text-4xl lg:mb-12 lg:text-5xl"
            >
                {{ section.title }}
            </h2>
        </ScreenSection>
    </template>
</template>
