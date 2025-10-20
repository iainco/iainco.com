<script setup lang="ts">
import ProjectCard from '@/components/ProjectCard.vue'
import ScreenSection from '@/components/ScreenSection.vue'
import TechIcon from '@/components/TechIcon.vue'
import TestimonialCard from '@/components/TestimonialCard.vue'
import { BicepsFlexed, Briefcase, LoaderPinwheel, PawPrint } from 'lucide-vue-next'
import { Form } from '@inertiajs/vue3'
import { Toaster } from '@/components/ui/sonner'
import { contact } from '@/routes'
import { toast } from 'vue-sonner'

import 'vue-sonner/style.css'
import TechTag from '@/components/TechTag.vue';

function handleSuccess(): void {
    toast.success('Thank you', {
        description: 'Your message has been sent successfully and I will be in touch soon.',
    })
}

function handleError(): void {
    toast.error('Oops', {
        description: 'Please correct all form errors highlighted in red and try again.',
    })
}
</script>

<template>
    <Toaster richColors/>

    <nav class="fixed top-3 sm:top-6 left-1/2 z-50 -translate-x-1/2 transform rounded-full bg-white/90 px-4 sm:px-8 py-3 sm:py-4 shadow-2xl backdrop-blur-md">
        <ul class="flex space-x-4 sm:space-x-8 text-xs sm:text-sm font-semibold">
            <li>
                <a href="#hero" class="text-gray-700 transition-colors hover:text-purple-600">
                    Home
                </a>
            </li>
            <li>
                <a href="#projects" class="text-gray-700 transition-colors hover:text-purple-600">
                    Projects
                </a>
            </li>
            <li>
                <a href="#testimonials" class="text-gray-700 transition-colors hover:text-purple-600">
                    Testimonials
                </a>
            </li>
            <li>
                <a href="#contact" class="text-gray-700 transition-colors hover:text-purple-600">
                    Contact
                </a>
            </li>
        </ul>
    </nav>

    <ScreenSection
        id="hero"
        from="from-purple-500"
        via="via-pink-500"
        to="to-orange-400"
    >
        <h1 class="funnel-display pt-16 sm:pt-8 mb-2 sm:mb-4 text-center text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white">
            iainco
        </h1>

        <h2 class="funnel-display mb-4 sm:mb-6 md:mb-8 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white">
            Full Stack Developer
        </h2>

        <div class="mb-6 sm:mb-8 flex justify-center">
            <img
                src="iainco.webp"
                class="w-full max-w-[240px] sm:max-w-[280px] md:[320px] lg:[360px] xl:[400px] lg:max-w-sm xl:max-w-md h-auto"
                alt="iainco"
            />
        </div>

        <div class="mb-12 flex flex-col items-center lg:flex-row lg:justify-center lg:space-x-4">
            <div class="flex space-x-4 justify-center">
                <TechIcon name="Laravel">
                    <path
                        style="fill: #f05340"
                        d="M 26.027344 0.136719 C 25.824219 0.214844 20.085938 3.484375 13.28125 7.394531 C 5.035156 12.136719 0.800781 14.632812 0.574219 14.867188 C 0.394531 15.070312 0.191406 15.421875 0.128906 15.644531 C -0.0429688 16.21875 -0.0546875 100.347656 0.117188 100.953125 C 0.179688 101.1875 0.382812 101.53125 0.566406 101.722656 C 1.011719 102.191406 50.238281 130.496094 50.835938 130.632812 C 51.113281 130.699219 51.425781 130.6875 51.734375 130.601562 C 52.40625 130.433594 101.503906 102.191406 101.941406 101.730469 C 102.121094 101.53125 102.324219 101.1875 102.390625 100.953125 C 102.476562 100.675781 102.507812 96.277344 102.507812 87.015625 L 102.507812 73.480469 L 114.476562 66.605469 C 125.761719 60.117188 126.453125 59.710938 126.742188 59.265625 L 127.039062 58.785156 L 127.039062 44.207031 C 127.039062 28.335938 127.070312 29.230469 126.441406 28.65625 C 126.273438 28.507812 120.523438 25.152344 113.652344 21.195312 L 101.171875 14.015625 L 99.785156 14.015625 L 87.574219 21.027344 C 80.851562 24.894531 75.136719 28.199219 74.859375 28.378906 C 74.582031 28.5625 74.25 28.902344 74.113281 29.148438 L 73.867188 29.574219 L 73.8125 43.308594 L 73.761719 57.046875 L 63.679688 62.855469 C 58.132812 66.042969 53.515625 68.683594 53.417969 68.707031 C 53.238281 68.757812 53.226562 67.449219 53.226562 42.203125 L 53.226562 15.632812 L 52.960938 15.175781 C 52.628906 14.621094 54.121094 15.507812 39.136719 6.894531 C 26.570312 -0.332031 26.871094 -0.179688 26.027344 0.136719 Z M 37.578125 10.65625 C 42.835938 13.671875 47.136719 16.167969 47.136719 16.199219 C 47.136719 16.230469 42.527344 18.894531 36.894531 22.132812 L 26.644531 28.015625 L 16.414062 22.132812 C 10.792969 18.894531 6.1875 16.230469 6.1875 16.199219 C 6.1875 16.167969 10.785156 13.503906 16.40625 10.273438 L 26.613281 4.402344 L 27.316406 4.785156 C 27.710938 5 32.332031 7.640625 37.578125 10.65625 Z M 110.730469 24.191406 C 116.265625 27.378906 120.84375 30.011719 120.886719 30.054688 C 121.003906 30.160156 100.703125 41.828125 100.425781 41.816406 C 100.148438 41.808594 80.097656 30.246094 80.105469 30.105469 C 80.117188 29.945312 100.289062 18.339844 100.492188 18.371094 C 100.585938 18.394531 105.195312 21.015625 110.730469 24.191406 Z M 14.828125 25.875 L 24.585938 31.492188 L 24.640625 59.304688 L 24.691406 87.121094 L 24.929688 87.496094 C 25.054688 87.695312 25.289062 87.964844 25.460938 88.089844 C 25.621094 88.207031 31.050781 91.300781 37.523438 94.953125 L 49.28125 101.59375 L 49.28125 113.359375 C 49.28125 119.816406 49.238281 125.113281 49.183594 125.113281 C 49.140625 125.113281 38.976562 119.296875 26.601562 112.175781 L 4.105469 99.238281 L 4.074219 59.464844 L 4.054688 19.703125 L 4.554688 19.980469 C 4.84375 20.132812 9.460938 22.785156 14.828125 25.875 Z M 49.28125 45.453125 L 49.28125 71.082031 L 48.886719 71.339844 C 48.351562 71.679688 28.8125 82.910156 28.746094 82.910156 C 28.714844 82.910156 28.691406 71.339844 28.691406 57.195312 L 28.703125 31.492188 L 38.910156 25.621094 C 44.523438 22.390625 49.152344 19.769531 49.207031 19.789062 C 49.246094 19.8125 49.28125 31.363281 49.28125 45.453125 Z M 88.222656 39.558594 L 98.453125 45.441406 L 98.453125 57.101562 C 98.453125 68.164062 98.441406 68.757812 98.273438 68.695312 C 98.164062 68.652344 93.535156 66 87.980469 62.800781 L 77.867188 56.992188 L 77.867188 45.335938 C 77.867188 38.917969 77.898438 33.675781 77.929688 33.675781 C 77.972656 33.675781 82.601562 36.320312 88.222656 39.558594 Z M 123.09375 45.261719 C 123.09375 51.644531 123.050781 56.910156 123.007812 56.960938 C 122.933594 57.078125 102.699219 68.738281 102.570312 68.738281 C 102.539062 68.738281 102.507812 63.496094 102.507812 57.078125 L 102.507812 45.421875 L 112.714844 39.546875 C 118.335938 36.320312 122.964844 33.675781 123.007812 33.675781 C 123.0625 33.675781 123.09375 38.886719 123.09375 45.261719 Z M 86.230469 66.46875 C 94.835938 71.421875 96.320312 72.308594 96.171875 72.425781 C 96.074219 72.488281 92.8125 74.363281 88.929688 76.582031 C 85.046875 78.796875 74.988281 84.53125 66.570312 89.328125 L 51.273438 98.054688 L 50.785156 97.789062 C 47.863281 96.191406 30.910156 86.546875 30.910156 86.472656 C 30.902344 86.3125 75.765625 60.53125 75.945312 60.597656 C 76.03125 60.628906 80.660156 63.269531 86.230469 66.46875 Z M 98.433594 87.558594 L 98.398438 99.238281 L 75.914062 112.175781 C 63.542969 119.296875 53.375 125.113281 53.324219 125.113281 C 53.269531 125.113281 53.226562 120.359375 53.226562 113.359375 L 53.226562 101.59375 L 75.765625 88.742188 C 88.148438 81.675781 98.324219 75.890625 98.378906 75.878906 C 98.421875 75.878906 98.441406 81.132812 98.433594 87.558594 Z M 98.433594 87.558594 "
                    />
                </TechIcon>
                <TechIcon name="Livewire">
                    <path
                        style="
                        fill-rule: evenodd;
                        fill: #fb70a9;
                        fill-opacity: 1;
                    "
                        d="M108.566 83.547c-1.937 2.926-3.406 6.527-7.34 6.527-6.624 0-6.98-10.203-13.609-10.203-6.625 0-6.265 10.203-12.887 10.203-6.625 0-6.98-10.203-13.609-10.203-6.625 0-6.266 10.203-12.887 10.203-6.625 0-6.98-10.203-13.605-10.203-6.629 0-6.27 10.203-12.89 10.203-2.083 0-3.544-1.008-4.778-2.39-4.738-8.239-7.465-17.895-7.465-28.22 0-30.222 23.367-54.722 52.191-54.722 28.825 0 52.192 24.5 52.192 54.723 0 8.64-1.91 16.816-5.313 24.082Zm0 0"
                    />
                    <path
                        style="
                        fill-rule: evenodd;
                        fill: #4e56a6;
                        fill-opacity: 1;
                    "
                        d="M40.844 78.145v22.668c0 4.066-3.301 7.363-7.371 7.363a7.365 7.365 0 0 1-7.371-7.364V73.45c1.375-2.523 2.945-4.707 5.78-4.707 4.61 0 6.223 5.79 8.962 9.403Zm27.843 1.183v35.844a8.185 8.185 0 0 1-8.187 8.183c-4.523 0-8.191-3.664-8.191-8.183v-40.57c1.543-2.973 3.132-5.86 6.39-5.86 5.16 0 6.563 7.242 9.989 10.586Zm26.211-.66v26.023c0 4.067-3.3 7.364-7.37 7.364-4.071 0-7.372-3.297-7.372-7.364V72.707c1.281-2.195 2.809-3.965 5.364-3.965 4.84 0 6.375 6.38 9.378 9.926Zm0 0"
                    />
                    <path
                        style="
                        fill-rule: evenodd;
                        fill: #000;
                        fill-opacity: 0.298039;
                    "
                        d="M40.844 85.094c-1.309-1.602-2.856-2.79-5.094-2.79-5.316 0-6.293 6.696-9.648 9.712V63.145a7.365 7.365 0 0 1 7.37-7.364c4.071 0 7.372 3.297 7.372 7.364Zm27.843.515c-1.394-1.855-3.023-3.304-5.496-3.304-5.914 0-6.457 8.285-10.882 10.578v-12.77c0-4.52 3.668-8.183 8.191-8.183a8.185 8.185 0 0 1 8.188 8.183Zm26.211-1.433c-1.136-1.117-2.48-1.871-4.265-1.871-5.73 0-6.418 7.777-10.477 10.343V66.734a7.371 7.371 0 0 1 14.742 0Zm0 0"
                    />
                    <path
                        style="
                        fill-rule: evenodd;
                        fill: #fb70a9;
                        fill-opacity: 1;
                    "
                        d="M108.566 83.547c-1.937 2.926-3.406 6.527-7.34 6.527-6.624 0-6.98-10.203-13.609-10.203-6.625 0-6.265 10.203-12.887 10.203-6.625 0-6.98-10.203-13.609-10.203-6.625 0-6.266 10.203-12.887 10.203-6.625 0-6.98-10.203-13.605-10.203-6.629 0-6.27 10.203-12.89 10.203-2.083 0-3.544-1.008-4.778-2.39-4.738-8.239-7.465-17.895-7.465-28.22 0-30.222 23.367-54.722 52.191-54.722 28.825 0 52.192 24.5 52.192 54.723 0 8.64-1.91 16.816-5.313 24.082Zm0 0"
                    />
                    <path
                        style="
                        fill-rule: evenodd;
                        fill: #e24ca6;
                        fill-opacity: 1;
                    "
                        d="M97.273 88.984c13.676-20.332 14.028-42.879 1.059-67.652 9.613 9.844 15.547 23.348 15.547 38.25 0 8.61-1.98 16.75-5.508 23.992-2.004 2.91-3.531 6.5-7.61 6.5a5.947 5.947 0 0 1-3.488-1.09Zm0 0"
                    />
                    <path
                        style="fill-rule: evenodd; fill: #fff; fill-opacity: 1"
                        d="M58.89 73.117c18.15 0 25.79-10.52 25.79-25.46 0-14.942-11.547-28.692-25.79-28.692-14.245 0-25.792 13.75-25.792 28.691 0 14.942 7.64 25.461 25.793 25.461Zm0 0"
                    />
                    <path
                        style="
                        fill-rule: evenodd;
                        fill: #030776;
                        fill-opacity: 1;
                    "
                        d="M61.625 37.836c0 5.89-4.332 10.668-9.672 10.668-5.344 0-9.672-4.777-9.672-10.668 0-5.89 4.328-10.668 9.672-10.668 5.34 0 9.672 4.777 9.672 10.668Zm0 0"
                    />
                    <path
                        style="fill-rule: evenodd; fill: #fff; fill-opacity: 1"
                        d="M55.176 35.375c0 2.719-2.164 4.922-4.836 4.922s-4.836-2.203-4.836-4.922 2.164-4.922 4.836-4.922 4.836 2.203 4.836 4.922Zm0 0"
                    />
                </TechIcon>
                <TechIcon name="Tailwind">
                    <path
                        fill="#38bdf8"
                        d="M64.004 25.602c-17.067 0-27.73 8.53-32 25.597 6.398-8.531 13.867-11.73 22.398-9.597 4.871 1.214 8.352 4.746 12.207 8.66C72.883 56.629 80.145 64 96.004 64c17.066 0 27.73-8.531 32-25.602-6.399 8.536-13.867 11.735-22.399 9.602-4.87-1.215-8.347-4.746-12.207-8.66-6.27-6.367-13.53-13.738-29.394-13.738zM32.004 64c-17.066 0-27.73 8.531-32 25.602C6.402 81.066 13.87 77.867 22.402 80c4.871 1.215 8.352 4.746 12.207 8.66 6.274 6.367 13.536 13.738 29.395 13.738 17.066 0 27.73-8.53 32-25.597-6.399 8.531-13.867 11.73-22.399 9.597-4.87-1.214-8.347-4.746-12.207-8.66C55.128 71.371 47.868 64 32.004 64zm0 0"
                    />
                </TechIcon>
                <TechIcon name="Inertia">
                    <defs>
                        <linearGradient
                            id="a"
                            x1="0"
                            y1="64"
                            x2="128"
                            y2="64"
                            gradientUnits="userSpaceOnUse"
                        >
                            <stop offset="0" stop-color="#9653ea" />
                            <stop offset="1" stop-color="#6e74ef" />
                        </linearGradient>
                    </defs>
                    <circle cx="64" cy="64" r="64" fill="url(#a)" />
                    <g transform="translate(3,-2) scale(0.32)">
                        <path
                            fill="#fff"
                            d="M137.331 117.6H52.4l82.069 82.069L52.4 281.737h84.931L219.4 199.67Z"
                        />
                        <path
                            fill="#fff"
                            d="M265.231 117.6H180.3l82.069 82.069-82.069 82.068h84.931L347.3 199.67Z"
                        />
                    </g>
                </TechIcon>
            </div>
            <div class="flex space-x-4 justify-center mt-4 lg:mt-0">
                <TechIcon name="Alpine">
                    <path
                        fill="#77c1d2"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M98.444 35.562 126 62.997 98.444 90.432 70.889 62.997z"
                    />
                    <path
                        fill="#2d3441"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="m29.556 35.562 57.126 56.876H31.571L2 62.997z"
                    />
                </TechIcon>
                <TechIcon name="Vue">
                    <path
                        fill="none"
                        d="M0 8.934l49.854.158 14.167 24.47 14.432-24.47L128 8.935l-63.834 110.14zm126.98.637l-24.36.02-38.476 66.053L25.691 9.592.942 9.572l63.211 107.89zm-25.149-.008l-22.745.168-15.053 24.647L49.216 9.73l-22.794-.168 37.731 64.476zm-75.834-.17l23.002.009m-23.002-.01l23.002.01"
                    />
                    <path
                        fill="#35495e"
                        d="M25.997 9.393l23.002.009L64.035 34.36 79.018 9.404 102 9.398 64.15 75.053z"
                    />
                    <path
                        fill="#41b883"
                        d="M.91 9.569l25.067-.172 38.15 65.659L101.98 9.401l25.11.026-62.966 108.06z"
                    />
                </TechIcon>
                <TechIcon name="React">
                    <g fill="#61DAFB">
                        <circle cx="64" cy="64" r="11.4" />
                        <path
                            d="M107.3 45.2c-2.2-.8-4.5-1.6-6.9-2.3.6-2.4 1.1-4.8 1.5-7.1 2.1-13.2-.2-22.5-6.6-26.1-1.9-1.1-4-1.6-6.4-1.6-7 0-15.9 5.2-24.9 13.9-9-8.7-17.9-13.9-24.9-13.9-2.4 0-4.5.5-6.4 1.6-6.4 3.7-8.7 13-6.6 26.1.4 2.3.9 4.7 1.5 7.1-2.4.7-4.7 1.4-6.9 2.3C8.2 50 1.4 56.6 1.4 64s6.9 14 19.3 18.8c2.2.8 4.5 1.6 6.9 2.3-.6 2.4-1.1 4.8-1.5 7.1-2.1 13.2.2 22.5 6.6 26.1 1.9 1.1 4 1.6 6.4 1.6 7.1 0 16-5.2 24.9-13.9 9 8.7 17.9 13.9 24.9 13.9 2.4 0 4.5-.5 6.4-1.6 6.4-3.7 8.7-13 6.6-26.1-.4-2.3-.9-4.7-1.5-7.1 2.4-.7 4.7-1.4 6.9-2.3 12.5-4.8 19.3-11.4 19.3-18.8s-6.8-14-19.3-18.8zM92.5 14.7c4.1 2.4 5.5 9.8 3.8 20.3-.3 2.1-.8 4.3-1.4 6.6-5.2-1.2-10.7-2-16.5-2.5-3.4-4.8-6.9-9.1-10.4-13 7.4-7.3 14.9-12.3 21-12.3 1.3 0 2.5.3 3.5.9zM81.3 74c-1.8 3.2-3.9 6.4-6.1 9.6-3.7.3-7.4.4-11.2.4-3.9 0-7.6-.1-11.2-.4-2.2-3.2-4.2-6.4-6-9.6-1.9-3.3-3.7-6.7-5.3-10 1.6-3.3 3.4-6.7 5.3-10 1.8-3.2 3.9-6.4 6.1-9.6 3.7-.3 7.4-.4 11.2-.4 3.9 0 7.6.1 11.2.4 2.2 3.2 4.2 6.4 6 9.6 1.9 3.3 3.7 6.7 5.3 10-1.7 3.3-3.4 6.6-5.3 10zm8.3-3.3c1.5 3.5 2.7 6.9 3.8 10.3-3.4.8-7 1.4-10.8 1.9 1.2-1.9 2.5-3.9 3.6-6 1.2-2.1 2.3-4.2 3.4-6.2zM64 97.8c-2.4-2.6-4.7-5.4-6.9-8.3 2.3.1 4.6.2 6.9.2 2.3 0 4.6-.1 6.9-.2-2.2 2.9-4.5 5.7-6.9 8.3zm-18.6-15c-3.8-.5-7.4-1.1-10.8-1.9 1.1-3.3 2.3-6.8 3.8-10.3 1.1 2 2.2 4.1 3.4 6.1 1.2 2.2 2.4 4.1 3.6 6.1zm-7-25.5c-1.5-3.5-2.7-6.9-3.8-10.3 3.4-.8 7-1.4 10.8-1.9-1.2 1.9-2.5 3.9-3.6 6-1.2 2.1-2.3 4.2-3.4 6.2zM64 30.2c2.4 2.6 4.7 5.4 6.9 8.3-2.3-.1-4.6-.2-6.9-.2-2.3 0-4.6.1-6.9.2 2.2-2.9 4.5-5.7 6.9-8.3zm22.2 21l-3.6-6c3.8.5 7.4 1.1 10.8 1.9-1.1 3.3-2.3 6.8-3.8 10.3-1.1-2.1-2.2-4.2-3.4-6.2zM31.7 35c-1.7-10.5-.3-17.9 3.8-20.3 1-.6 2.2-.9 3.5-.9 6 0 13.5 4.9 21 12.3-3.5 3.8-7 8.2-10.4 13-5.8.5-11.3 1.4-16.5 2.5-.6-2.3-1-4.5-1.4-6.6zM7 64c0-4.7 5.7-9.7 15.7-13.4 2-.8 4.2-1.5 6.4-2.1 1.6 5 3.6 10.3 6 15.6-2.4 5.3-4.5 10.5-6 15.5C15.3 75.6 7 69.6 7 64zm28.5 49.3c-4.1-2.4-5.5-9.8-3.8-20.3.3-2.1.8-4.3 1.4-6.6 5.2 1.2 10.7 2 16.5 2.5 3.4 4.8 6.9 9.1 10.4 13-7.4 7.3-14.9 12.3-21 12.3-1.3 0-2.5-.3-3.5-.9zM96.3 93c1.7 10.5.3 17.9-3.8 20.3-1 .6-2.2.9-3.5.9-6 0-13.5-4.9-21-12.3 3.5-3.8 7-8.2 10.4-13 5.8-.5 11.3-1.4 16.5-2.5.6 2.3 1 4.5 1.4 6.6zm9-15.6c-2 .8-4.2 1.5-6.4 2.1-1.6-5-3.6-10.3-6-15.6 2.4-5.3 4.5-10.5 6-15.5 13.8 4 22.1 10 22.1 15.6 0 4.7-5.8 9.7-15.7 13.4z"
                        />
                    </g>
                </TechIcon>
                <TechIcon name="Flutter">
                    <g fill="#3FB6D3">
                        <path
                            d="M12.3 64.2L76.3 0h39.4L32.1 83.6zM76.3 128h39.4L81.6 93.9l34.1-34.8H76.3L42.2 93.5z"
                        />
                    </g>
                    <path
                        fill="#27AACD"
                        d="M81.6 93.9l-20-20-19.4 19.6 19.4 19.6z"
                    />
                    <path
                        fill="#19599A"
                        d="M115.7 128L81.6 93.9l-20 19.2L76.3 128z"
                    />
                    <linearGradient
                        id="flutter-original-a"
                        gradientUnits="userSpaceOnUse"
                        x1="59.365"
                        y1="116.36"
                        x2="86.825"
                        y2="99.399"
                    >
                        <stop offset="0" stop-color="#1b4e94" />
                        <stop offset=".63" stop-color="#1a5497" />
                        <stop offset="1" stop-color="#195a9b" />
                    </linearGradient>
                    <path
                        fill="url(#flutter-original-a)"
                        d="M61.6 113.1l30.8-8.4-10.8-10.8z"
                    />
                </TechIcon>
            </div>
        </div>

        <p class="px-4 mx-auto max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl text-base sm:text-lg md:text-xl text-white text-center">
            Scottish developer passionate about crafting modern, efficient web applications. I love problem solving, clean code, and diving deep into projects. When I’m not coding, you’ll find me watching F1, running, or spending time with family.
        </p>
    </ScreenSection>

    <ScreenSection
        id="projects"
        from="from-cyan-400"
        via="via-blue-500"
        to="to-indigo-600"
    >
        <h2 class="funnel-display mb-6 sm:mb-8 md:mb-10 lg:mb-12 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white">
            Featured Projects
        </h2>

        <div class="mx-auto grid max-w-6xl sm:gap-6 md:gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            <ProjectCard
                :icon="BicepsFlexed"
                :iconClasses="['from-purple-400', 'to-pink-500']"
                url="https://myfitpro.com"
                name="My Fit Pro"
                description="Fully featured live-streaming platform for fitness instructors. Customer onboarding, payment processing, class management, automated server provisioning, realtime events via Pusher, mobile app APIs."
            >
                <template #tech-tags>
                    <TechTag name="Laravel" bgColor="bg-red-600" hoverBgColor="hover:bg-red-700"/>
                    <TechTag name="Livewire" bgColor="bg-sky-500" hoverBgColor="hover:bg-sky-600"/>
                    <TechTag name="Vue" bgColor="bg-emerald-500" hoverBgColor="hover:bg-emerald-600"/>
                    <TechTag name="Alpine" bgColor="bg-blue-700" hoverBgColor="hover:bg-blue-800"/>
                    <TechTag name="Tailwind" bgColor="bg-cyan-400" hoverBgColor="hover:bg-cyan-500"/>
                </template>
            </ProjectCard>

            <ProjectCard
                :icon="PawPrint"
                :iconClasses="['from-green-400', 'to-cyan-500']"
                name="IDTMobile"
                description="Integrated diagnostic tool for vets &amp; farmers. Flutter mobile app with Laravel backend, complex reference data management with API versioning, user authorisation and dashboard."
            >
                <template #tech-tags>
                    <TechTag name="Laravel" bgColor="bg-red-600" hoverBgColor="hover:bg-red-700"/>
                    <TechTag name="Livewire" bgColor="bg-sky-500" hoverBgColor="hover:bg-sky-600"/>
                    <TechTag name="Tailwind" bgColor="bg-cyan-400" hoverBgColor="hover:bg-cyan-500"/>
                    <TechTag name="Flutter" bgColor="bg-blue-500" hoverBgColor="hover:bg-blue-600"/>
                </template>
            </ProjectCard>

            <ProjectCard
                :icon="Briefcase"
                :iconClasses="['from-orange-400', 'to-red-500']"
                name="Workways"
                description="My own side project which helps freelancers automate their billing/invoicing flow and generate project specifications. Uses FreeAgent's API and Discord to help save time."
            >
                <template #tech-tags>
                    <TechTag name="Laravel" bgColor="bg-red-600" hoverBgColor="hover:bg-red-700"/>
                    <TechTag name="Inertia" bgColor="bg-indigo-600" hoverBgColor="hover:bg-indigo-700"/>
                    <TechTag name="React" bgColor="bg-sky-400" hoverBgColor="hover:bg-sky-500"/>
                    <TechTag name="Tailwind" bgColor="bg-cyan-400" hoverBgColor="hover:bg-cyan-500"/>
                </template>
            </ProjectCard>
        </div>
    </ScreenSection>

    <ScreenSection
        id="testimonials"
        from="from-yellow-400"
        via="via-orange-500"
        to="to-red-500"
    >
        <h2 class="funnel-display mb-6 sm:mb-8 md:mb-10 lg:mb-12 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white">
            What Clients Say
        </h2>

        <div class="mx-auto grid max-w-6xl gap-0 sm:gap-6 md:gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            <TestimonialCard
                :iconClasses="['from-purple-400', 'to-pink-500']"
                clientName="Alex M."
                projectName="My Fit Pro"
                bodyText="Iain is always great to work with. I’ve worked with him for over 5 years, and our business couldn’t have succeeded without him. Fast and efficient, he turns minimal briefs into production code, solves problems quickly, learns fast, and communicates clearly with detailed notes. One of the best developers I’ve worked with."/>

            <TestimonialCard
                :icon-classes="['from-orange-400', 'to-red-500']"
                clientName="Harriet A."
                projectName="Glasgow University"
                bodyText="It’s been great working with Iain on our project. He found solutions to all technical challenges and developed an excellent product that delivered exactly what was needed. We especially appreciated his clear communication, thoughtful discussions, and care in ensuring the final product met our expectations."/>

            <TestimonialCard
                :iconClasses="['from-cyan-400', 'to-blue-500']"
                clientName="Connor F."
                projectName="Pick Protection"
                bodyText="I’ve worked with Iain on more problems than I can count. He’s my go-to for any programming question and always willing to bounce ideas for the best solution. Always available, quick to respond, and great at simplifying complex ideas. His business insight shows in his work, and I’d love to work with him again."/>
        </div>
    </ScreenSection>

    <ScreenSection
        id="contact"
        from="from-green-400"
        via="via-teal-500"
        to="to-blue-600"
    >
        <h2 class="funnel-display mb-6 sm:mb-8 md:mb-10 lg:mb-12 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white">
            Let's Build Something Amazing
        </h2>

        <Form
            @success="handleSuccess"
            @error="handleError"
            :action="contact()"
            method="post"
            #default="{
                errors,
                hasErrors,
                processing,
            }"
            :options="{
                preserveScroll: true,
            }"
            resetOnSuccess
            class="mx-auto max-w-4xl p-8 bg-white rounded-none sm:rounded-4xl border-gray-200 border-4 shadow-2xl"
        >
            <div class="mb-4 sm:mb-6">
                <label class="mb-2 block font-semibold text-gray-700 text-sm sm:text-base" for="name">
                    Name
                </label>

                <input
                    name="name"
                    class="w-full rounded-lg border-2 px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base transition-colors focus:border-teal-500 focus:outline-none"
                    :class="{ 'border-gray-200': !hasErrors, 'border-red-200': hasErrors }"
                    type="text"
                    id="name"
                    placeholder="Your name"
                />

                <div v-if="errors.name" class="mt-1 text-xs sm:text-sm text-red-600">
                    {{ errors.name }}
                </div>
            </div>

            <div class="mb-4 sm:mb-6">
                <label class="mb-2 block font-semibold text-gray-700 text-sm sm:text-base" for="email">
                    Email
                </label>

                <input
                    name="email"
                    class="w-full rounded-lg border-2 px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base transition-colors focus:border-teal-500 focus:outline-none"
                    :class="{ 'border-gray-200': !hasErrors, 'border-red-200': hasErrors }"
                    type="email"
                    id="email"
                    placeholder="your@email.com"
                />

                <div v-if="errors.email" class="mt-1 text-xs sm:text-sm text-red-600">
                    {{ errors.email }}
                </div>
            </div>

            <div class="mb-4 sm:mb-6">
                <label class="mb-2 block font-semibold text-gray-700 text-sm sm:text-base" for="message">
                    Message
                </label>

                <textarea
                    name="message"
                    class="w-full resize-none rounded-lg border-2 px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base transition-colors focus:border-teal-500 focus:outline-none"
                    :class="{ 'border-gray-200': !hasErrors, 'border-red-200': hasErrors }"
                    id="message"
                    rows="5"
                    placeholder="Tell me about your project..."
                ></textarea>

                <div v-if="errors.message" class="mt-1 text-xs sm:text-sm text-red-600">
                    {{ errors.message }}
                </div>
            </div>

            <div class="flex items-center justify-end space-x-2">
                <LoaderPinwheel v-if="processing" class="text-green-400 animate-spin w-5 h-5 sm:w-6 sm:h-6"/>

                <div class="inline-flex rounded-full bg-gradient-to-br from-green-400 via-teal-500 to-blue-600 p-[2px]">
                    <button
                        type="submit"
                        :disabled="processing"
                        class="min-w-max rounded-full bg-white px-4 sm:px-6 py-2 sm:py-2.5 text-sm sm:text-base font-bold text-teal-600 hover:bg-gray-50">
                        Send Message
                    </button>
                </div>
            </div>
        </Form>
    </ScreenSection>
</template>
