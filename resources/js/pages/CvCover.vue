<script setup lang="ts">
import ScreenSection from '@/components/ScreenSection.vue'

defineProps<{
    url: string
}>()
</script>

<style>
@media print {
    * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        color-adjust: exact !important;
    }
}
</style>

<template>
    <ScreenSection
        id="cover"
        from="from-purple-500"
        via="via-pink-500"
        to="to-orange-400"
        :animated="false"
    >
        <div class="flex flex-col items-center gap-6 text-center sm:gap-8 lg:gap-10">
            <div class="flex justify-center">
                <img
                    src="iainco.webp"
                    class="w-full max-w-[320px] h-auto"
                    alt="iainco"
                />
            </div>

            <h1 class="funnel-display text-3xl font-bold text-white sm:text-4xl md:text-5xl lg:text-6xl">
                Iain Collins
            </h1>

            <p class="text-xl text-white/90 sm:text-2xl md:text-3xl">
                Full Stack Developer
            </p>

            <div class="mt-4 rounded-full bg-white px-8 py-4">
                <a
                    :href="url"
                    class="text-lg font-semibold text-pink-500 no-underline sm:text-xl"
                >
                    View My CV
                </a>
            </div>
        </div>
    </ScreenSection>
</template>
