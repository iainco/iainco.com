<script setup lang="ts">
import { products } from '@/data/products';
import {
    Award,
    Building2,
    Calendar,
    FolderOpen,
    Globe,
    GraduationCap,
    Mail,
    MapPin,
    Phone,
    Rocket,
} from 'lucide-vue-next';
import { computed } from 'vue';

interface Employer {
    role: string;
    company: string;
    period: string;
    summary: string;
    projects: {
        name: string;
        period: string;
        description: string;
        bullets: string[];
    }[];
}

interface WorkExperience {
    title: string;
    content: {
        employers: Employer[];
    };
}

interface ContactDetails {
    content: {
        email?: string;
        phone?: string;
        location?: string;
    };
}

interface Qualification {
    institution: string;
    degree: string;
    award?: string;
    period: string;
    logo?: string;
}

interface Education {
    title: string;
    content: {
        qualifications: Qualification[];
    };
}

const props = defineProps<{
    workExperience: WorkExperience;
    contactDetails?: ContactDetails | null;
    education?: Education | null;
}>();

const palette = ['#a855f7', '#ec4899', '#f97316'];

const pageGradient = {
    backgroundImage: `linear-gradient(to bottom right, ${palette.join(', ')})`,
    backgroundAttachment: 'fixed',
};

const stack = [
    {
        name: 'Laravel',
        svg: `<path style="fill:#f05340" d="M 26.027344 0.136719 C 25.824219 0.214844 20.085938 3.484375 13.28125 7.394531 C 5.035156 12.136719 0.800781 14.632812 0.574219 14.867188 C 0.394531 15.070312 0.191406 15.421875 0.128906 15.644531 C -0.0429688 16.21875 -0.0546875 100.347656 0.117188 100.953125 C 0.179688 101.1875 0.382812 101.53125 0.566406 101.722656 C 1.011719 102.191406 50.238281 130.496094 50.835938 130.632812 C 51.113281 130.699219 51.425781 130.6875 51.734375 130.601562 C 52.40625 130.433594 101.503906 102.191406 101.941406 101.730469 C 102.121094 101.53125 102.324219 101.1875 102.390625 100.953125 C 102.476562 100.675781 102.507812 96.277344 102.507812 87.015625 L 102.507812 73.480469 L 114.476562 66.605469 C 125.761719 60.117188 126.453125 59.710938 126.742188 59.265625 L 127.039062 58.785156 L 127.039062 44.207031 C 127.039062 28.335938 127.070312 29.230469 126.441406 28.65625 C 126.273438 28.507812 120.523438 25.152344 113.652344 21.195312 L 101.171875 14.015625 L 99.785156 14.015625 L 87.574219 21.027344 C 80.851562 24.894531 75.136719 28.199219 74.859375 28.378906 C 74.582031 28.5625 74.25 28.902344 74.113281 29.148438 L 73.867188 29.574219 L 73.8125 43.308594 L 73.761719 57.046875 L 63.679688 62.855469 C 58.132812 66.042969 53.515625 68.683594 53.417969 68.707031 C 53.238281 68.757812 53.226562 67.449219 53.226562 42.203125 L 53.226562 15.632812 L 52.960938 15.175781 C 52.628906 14.621094 54.121094 15.507812 39.136719 6.894531 C 26.570312 -0.332031 26.871094 -0.179688 26.027344 0.136719 Z M 37.578125 10.65625 C 42.835938 13.671875 47.136719 16.167969 47.136719 16.199219 C 47.136719 16.230469 42.527344 18.894531 36.894531 22.132812 L 26.644531 28.015625 L 16.414062 22.132812 C 10.792969 18.894531 6.1875 16.230469 6.1875 16.199219 C 6.1875 16.167969 10.785156 13.503906 16.40625 10.273438 L 26.613281 4.402344 L 27.316406 4.785156 C 27.710938 5 32.332031 7.640625 37.578125 10.65625 Z M 110.730469 24.191406 C 116.265625 27.378906 120.84375 30.011719 120.886719 30.054688 C 121.003906 30.160156 100.703125 41.828125 100.425781 41.816406 C 100.148438 41.808594 80.097656 30.246094 80.105469 30.105469 C 80.117188 29.945312 100.289062 18.339844 100.492188 18.371094 C 100.585938 18.394531 105.195312 21.015625 110.730469 24.191406 Z M 14.828125 25.875 L 24.585938 31.492188 L 24.640625 59.304688 L 24.691406 87.121094 L 24.929688 87.496094 C 25.054688 87.695312 25.289062 87.964844 25.460938 88.089844 C 25.621094 88.207031 31.050781 91.300781 37.523438 94.953125 L 49.28125 101.59375 L 49.28125 113.359375 C 49.28125 119.816406 49.238281 125.113281 49.183594 125.113281 C 49.140625 125.113281 38.976562 119.296875 26.601562 112.175781 L 4.105469 99.238281 L 4.074219 59.464844 L 4.054688 19.703125 L 4.554688 19.980469 C 4.84375 20.132812 9.460938 22.785156 14.828125 25.875 Z M 49.28125 45.453125 L 49.28125 71.082031 L 48.886719 71.339844 C 48.351562 71.679688 28.8125 82.910156 28.746094 82.910156 C 28.714844 82.910156 28.691406 71.339844 28.691406 57.195312 L 28.703125 31.492188 L 38.910156 25.621094 C 44.523438 22.390625 49.152344 19.769531 49.207031 19.789062 C 49.246094 19.8125 49.28125 31.363281 49.28125 45.453125 Z M 88.222656 39.558594 L 98.453125 45.441406 L 98.453125 57.101562 C 98.453125 68.164062 98.441406 68.757812 98.273438 68.695312 C 98.164062 68.652344 93.535156 66 87.980469 62.800781 L 77.867188 56.992188 L 77.867188 45.335938 C 77.867188 38.917969 77.898438 33.675781 77.929688 33.675781 C 77.972656 33.675781 82.601562 36.320312 88.222656 39.558594 Z M 123.09375 45.261719 C 123.09375 51.644531 123.050781 56.910156 123.007812 56.960938 C 122.933594 57.078125 102.699219 68.738281 102.570312 68.738281 C 102.539062 68.738281 102.507812 63.496094 102.507812 57.078125 L 102.507812 45.421875 L 112.714844 39.546875 C 118.335938 36.320312 122.964844 33.675781 123.007812 33.675781 C 123.0625 33.675781 123.09375 38.886719 123.09375 45.261719 Z M 86.230469 66.46875 C 94.835938 71.421875 96.320312 72.308594 96.171875 72.425781 C 96.074219 72.488281 92.8125 74.363281 88.929688 76.582031 C 85.046875 78.796875 74.988281 84.53125 66.570312 89.328125 L 51.273438 98.054688 L 50.785156 97.789062 C 47.863281 96.191406 30.910156 86.546875 30.910156 86.472656 C 30.902344 86.3125 75.765625 60.53125 75.945312 60.597656 C 76.03125 60.628906 80.660156 63.269531 86.230469 66.46875 Z M 98.433594 87.558594 L 98.398438 99.238281 L 75.914062 112.175781 C 63.542969 119.296875 53.375 125.113281 53.324219 125.113281 C 53.269531 125.113281 53.226562 120.359375 53.226562 113.359375 L 53.226562 101.59375 L 75.765625 88.742188 C 88.148438 81.675781 98.324219 75.890625 98.378906 75.878906 C 98.421875 75.878906 98.441406 81.132812 98.433594 87.558594 Z M 98.433594 87.558594 "/>`,
    },
    {
        name: 'Livewire',
        svg: `<path style="fill-rule:evenodd;fill:#fb70a9;fill-opacity:1" d="M108.566 83.547c-1.937 2.926-3.406 6.527-7.34 6.527-6.624 0-6.98-10.203-13.609-10.203-6.625 0-6.265 10.203-12.887 10.203-6.625 0-6.98-10.203-13.609-10.203-6.625 0-6.266 10.203-12.887 10.203-6.625 0-6.98-10.203-13.605-10.203-6.629 0-6.27 10.203-12.89 10.203-2.083 0-3.544-1.008-4.778-2.39-4.738-8.239-7.465-17.895-7.465-28.22 0-30.222 23.367-54.722 52.191-54.722 28.825 0 52.192 24.5 52.192 54.723 0 8.64-1.91 16.816-5.313 24.082Zm0 0"/><path style="fill-rule:evenodd;fill:#4e56a6;fill-opacity:1" d="M40.844 78.145v22.668c0 4.066-3.301 7.363-7.371 7.363a7.365 7.365 0 0 1-7.371-7.364V73.45c1.375-2.523 2.945-4.707 5.78-4.707 4.61 0 6.223 5.79 8.962 9.403Zm27.843 1.183v35.844a8.185 8.185 0 0 1-8.187 8.183c-4.523 0-8.191-3.664-8.191-8.183v-40.57c1.543-2.973 3.132-5.86 6.39-5.86 5.16 0 6.563 7.242 9.989 10.586Zm26.211-.66v26.023c0 4.067-3.3 7.364-7.37 7.364-4.071 0-7.372-3.297-7.372-7.364V72.707c1.281-2.195 2.809-3.965 5.364-3.965 4.84 0 6.375 6.38 9.378 9.926Zm0 0"/><path style="fill-rule:evenodd;fill:#000;fill-opacity:0.298039" d="M40.844 85.094c-1.309-1.602-2.856-2.79-5.094-2.79-5.316 0-6.293 6.696-9.648 9.712V63.145a7.365 7.365 0 0 1 7.37-7.364c4.071 0 7.372 3.297 7.372 7.364Zm27.843.515c-1.394-1.855-3.023-3.304-5.496-3.304-5.914 0-6.457 8.285-10.882 10.578v-12.77c0-4.52 3.668-8.183 8.191-8.183a8.185 8.185 0 0 1 8.188 8.183Zm26.211-1.433c-1.136-1.117-2.48-1.871-4.265-1.871-5.73 0-6.418 7.777-10.477 10.343V66.734a7.371 7.371 0 0 1 14.742 0Zm0 0"/><path style="fill-rule:evenodd;fill:#fb70a9;fill-opacity:1" d="M108.566 83.547c-1.937 2.926-3.406 6.527-7.34 6.527-6.624 0-6.98-10.203-13.609-10.203-6.625 0-6.265 10.203-12.887 10.203-6.625 0-6.98-10.203-13.609-10.203-6.625 0-6.266 10.203-12.887 10.203-6.625 0-6.98-10.203-13.605-10.203-6.629 0-6.27 10.203-12.89 10.203-2.083 0-3.544-1.008-4.778-2.39-4.738-8.239-7.465-17.895-7.465-28.22 0-30.222 23.367-54.722 52.191-54.722 28.825 0 52.192 24.5 52.192 54.723 0 8.64-1.91 16.816-5.313 24.082Zm0 0"/><path style="fill-rule:evenodd;fill:#e24ca6;fill-opacity:1" d="M97.273 88.984c13.676-20.332 14.028-42.879 1.059-67.652 9.613 9.844 15.547 23.348 15.547 38.25 0 8.61-1.98 16.75-5.508 23.992-2.004 2.91-3.531 6.5-7.61 6.5a5.947 5.947 0 0 1-3.488-1.09Zm0 0"/><path style="fill-rule:evenodd;fill:#fff;fill-opacity:1" d="M58.89 73.117c18.15 0 25.79-10.52 25.79-25.46 0-14.942-11.547-28.692-25.79-28.692-14.245 0-25.792 13.75-25.792 28.691 0 14.942 7.64 25.461 25.793 25.461Zm0 0"/><path style="fill-rule:evenodd;fill:#030776;fill-opacity:1" d="M61.625 37.836c0 5.89-4.332 10.668-9.672 10.668-5.344 0-9.672-4.777-9.672-10.668 0-5.89 4.328-10.668 9.672-10.668 5.34 0 9.672 4.777 9.672 10.668Zm0 0"/><path style="fill-rule:evenodd;fill:#fff;fill-opacity:1" d="M55.176 35.375c0 2.719-2.164 4.922-4.836 4.922s-4.836-2.203-4.836-4.922 2.164-4.922 4.836-4.922 4.836 2.203 4.836 4.922Zm0 0"/>`,
    },
    {
        name: 'Tailwind',
        svg: `<path fill="#38bdf8" d="M64.004 25.602c-17.067 0-27.73 8.53-32 25.597 6.398-8.531 13.867-11.73 22.398-9.597 4.871 1.214 8.352 4.746 12.207 8.66C72.883 56.629 80.145 64 96.004 64c17.066 0 27.73-8.531 32-25.602-6.399 8.536-13.867 11.735-22.399 9.602-4.87-1.215-8.347-4.746-12.207-8.66-6.27-6.367-13.53-13.738-29.394-13.738zM32.004 64c-17.066 0-27.73 8.531-32 25.602C6.402 81.066 13.87 77.867 22.402 80c4.871 1.215 8.352 4.746 12.207 8.66 6.274 6.367 13.536 13.738 29.395 13.738 17.066 0 27.73-8.53 32-25.597-6.399 8.531-13.867 11.73-22.399 9.597-4.87-1.214-8.347-4.746-12.207-8.66C55.128 71.371 47.868 64 32.004 64zm0 0"/>`,
    },
    {
        name: 'Inertia',
        svg: `<defs><linearGradient id="cv-inertia-a" x1="0" y1="64" x2="128" y2="64" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#9653ea"/><stop offset="1" stop-color="#6e74ef"/></linearGradient></defs><circle cx="64" cy="64" r="64" fill="url(#cv-inertia-a)"/><g transform="translate(3,-2) scale(0.32)"><path fill="#fff" d="M137.331 117.6H52.4l82.069 82.069L52.4 281.737h84.931L219.4 199.67Z"/><path fill="#fff" d="M265.231 117.6H180.3l82.069 82.069-82.069 82.068h84.931L347.3 199.67Z"/></g>`,
    },
    {
        name: 'Alpine',
        svg: `<path fill="#77c1d2" fill-rule="evenodd" clip-rule="evenodd" d="M98.444 35.562 126 62.997 98.444 90.432 70.889 62.997z"/><path fill="#2d3441" fill-rule="evenodd" clip-rule="evenodd" d="m29.556 35.562 57.126 56.876H31.571L2 62.997z"/>`,
    },
    {
        name: 'Vue',
        svg: `<path fill="#35495e" d="M25.997 9.393l23.002.009L64.035 34.36 79.018 9.404 102 9.398 64.15 75.053z"/><path fill="#41b883" d="M.91 9.569l25.067-.172 38.15 65.659L101.98 9.401l25.11.026-62.966 108.06z"/>`,
    },
    {
        name: 'React',
        svg: `<g fill="#61DAFB"><circle cx="64" cy="64" r="11.4"/><path d="M107.3 45.2c-2.2-.8-4.5-1.6-6.9-2.3.6-2.4 1.1-4.8 1.5-7.1 2.1-13.2-.2-22.5-6.6-26.1-1.9-1.1-4-1.6-6.4-1.6-7 0-15.9 5.2-24.9 13.9-9-8.7-17.9-13.9-24.9-13.9-2.4 0-4.5.5-6.4 1.6-6.4 3.7-8.7 13-6.6 26.1.4 2.3.9 4.7 1.5 7.1-2.4.7-4.7 1.4-6.9 2.3C8.2 50 1.4 56.6 1.4 64s6.9 14 19.3 18.8c2.2.8 4.5 1.6 6.9 2.3-.6 2.4-1.1 4.8-1.5 7.1-2.1 13.2.2 22.5 6.6 26.1 1.9 1.1 4 1.6 6.4 1.6 7.1 0 16-5.2 24.9-13.9 9 8.7 17.9 13.9 24.9 13.9 2.4 0 4.5-.5 6.4-1.6 6.4-3.7 8.7-13 6.6-26.1-.4-2.3-.9-4.7-1.5-7.1 2.4-.7 4.7-1.4 6.9-2.3 12.5-4.8 19.3-11.4 19.3-18.8s-6.8-14-19.3-18.8zM92.5 14.7c4.1 2.4 5.5 9.8 3.8 20.3-.3 2.1-.8 4.3-1.4 6.6-5.2-1.2-10.7-2-16.5-2.5-3.4-4.8-6.9-9.1-10.4-13 7.4-7.3 14.9-12.3 21-12.3 1.3 0 2.5.3 3.5.9zM81.3 74c-1.8 3.2-3.9 6.4-6.1 9.6-3.7.3-7.4.4-11.2.4-3.9 0-7.6-.1-11.2-.4-2.2-3.2-4.2-6.4-6-9.6-1.9-3.3-3.7-6.7-5.3-10 1.6-3.3 3.4-6.7 5.3-10 1.8-3.2 3.9-6.4 6.1-9.6 3.7-.3 7.4-.4 11.2-.4 3.9 0 7.6.1 11.2.4 2.2 3.2 4.2 6.4 6 9.6 1.9 3.3 3.7 6.7 5.3 10-1.7 3.3-3.4 6.6-5.3 10zm8.3-3.3c1.5 3.5 2.7 6.9 3.8 10.3-3.4.8-7 1.4-10.8 1.9 1.2-1.9 2.5-3.9 3.6-6 1.2-2.1 2.3-4.2 3.4-6.2zM64 97.8c-2.4-2.6-4.7-5.4-6.9-8.3 2.3.1 4.6.2 6.9.2 2.3 0 4.6-.1 6.9-.2-2.2 2.9-4.5 5.7-6.9 8.3zm-18.6-15c-3.8-.5-7.4-1.1-10.8-1.9 1.1-3.3 2.3-6.8 3.8-10.3 1.1 2 2.2 4.1 3.4 6.1 1.2 2.2 2.4 4.1 3.6 6.1zm-7-25.5c-1.5-3.5-2.7-6.9-3.8-10.3 3.4-.8 7-1.4 10.8-1.9-1.2 1.9-2.5 3.9-3.6 6-1.2 2.1-2.3 4.2-3.4 6.2zM64 30.2c2.4 2.6 4.7 5.4 6.9 8.3-2.3-.1-4.6-.2-6.9-.2-2.3 0-4.6.1-6.9.2 2.2-2.9 4.5-5.7 6.9-8.3zm22.2 21l-3.6-6c3.8.5 7.4 1.1 10.8 1.9-1.1 3.3-2.3 6.8-3.8 10.3-1.1-2.1-2.2-4.2-3.4-6.2zM31.7 35c-1.7-10.5-.3-17.9 3.8-20.3 1-.6 2.2-.9 3.5-.9 6 0 13.5 4.9 21 12.3-3.5 3.8-7 8.2-10.4 13-5.8.5-11.3 1.4-16.5 2.5-.6-2.3-1-4.5-1.4-6.6zM7 64c0-4.7 5.7-9.7 15.7-13.4 2-.8 4.2-1.5 6.4-2.1 1.6 5 3.6 10.3 6 15.6-2.4 5.3-4.5 10.5-6 15.5C15.3 75.6 7 69.6 7 64zm28.5 49.3c-4.1-2.4-5.5-9.8-3.8-20.3.3-2.1.8-4.3 1.4-6.6 5.2 1.2 10.7 2 16.5 2.5 3.4 4.8 6.9 9.1 10.4 13-7.4 7.3-14.9 12.3-21 12.3-1.3 0-2.5-.3-3.5-.9zM96.3 93c1.7 10.5.3 17.9-3.8 20.3-1 .6-2.2.9-3.5.9-6 0-13.5-4.9-21-12.3 3.5-3.8 7-8.2 10.4-13 5.8-.5 11.3-1.4 16.5-2.5.6 2.3 1 4.5 1.4 6.6zm9-15.6c-2 .8-4.2 1.5-6.4 2.1-1.6-5-3.6-10.3-6-15.6 2.4-5.3 4.5-10.5 6-15.5 13.8 4 22.1 10 22.1 15.6 0 4.7-5.8 9.7-15.7 13.4z"/></g>`,
    },
    {
        name: 'Flutter',
        svg: `<g fill="#3FB6D3"><path d="M12.3 64.2L76.3 0h39.4L32.1 83.6zM76.3 128h39.4L81.6 93.9l34.1-34.8H76.3L42.2 93.5z"/></g><path fill="#27AACD" d="M81.6 93.9l-20-20-19.4 19.6 19.4 19.6z"/><path fill="#19599A" d="M115.7 128L81.6 93.9l-20 19.2L76.3 128z"/><linearGradient id="cv-flutter-a" gradientUnits="userSpaceOnUse" x1="59.365" y1="116.36" x2="86.825" y2="99.399"><stop offset="0" stop-color="#1b4e94"/><stop offset=".63" stop-color="#1a5497"/><stop offset="1" stop-color="#195a9b"/></linearGradient><path fill="url(#cv-flutter-a)" d="M61.6 113.1l30.8-8.4-10.8-10.8z"/>`,
    },
];

const employers = computed(() => props.workExperience.content.employers ?? []);

const qualifications = computed(
    () => props.education?.content.qualifications ?? [],
);

const educationTitle = computed(() => props.education?.title || 'Education');

const displayUrl = (url: string) =>
    url.replace(/^https?:\/\//, '').replace(/\/$/, '');
</script>

<template>
    <div class="bg-white">
        <div :style="pageGradient" class="p-12">
            <div
                class="flex flex-col rounded-4xl border-4 border-gray-200 bg-white p-8"
            >
                <!-- Header with logo -->
                <div
                    class="flex items-center justify-between border-b-2 border-gray-100 pt-8 pb-6"
                >
                    <div>
                        <h1
                            class="funnel-display text-4xl leading-none font-bold text-pink-500"
                        >
                            iainco
                        </h1>
                        <p class="mt-1 text-sm text-gray-500">
                            Full Stack Developer
                        </p>
                    </div>
                    <img src="/iainco.webp" class="h-24 w-auto" alt="iainco" />
                </div>

                <!-- Profile -->
                <div class="pt-6">
                    <p class="text-[13px] leading-relaxed text-gray-700">
                        Scottish full stack developer passionate about crafting
                        modern, efficient applications. I love problem solving,
                        clean code, and diving deep into projects. When I'm not
                        coding, you'll find me spending time with my family,
                        running or watching F1.
                    </p>

                    <div
                        v-if="contactDetails"
                        class="mt-4 flex flex-wrap items-center gap-x-3 gap-y-2 text-[12px]"
                    >
                        <a
                            href="https://iainco.com"
                            class="inline-flex items-center gap-1.5 rounded-full bg-pink-50 px-3 py-1 font-medium text-pink-600"
                        >
                            <Globe class="h-3.5 w-3.5" />
                            iainco.com
                        </a>
                        <a
                            v-if="contactDetails.content.email"
                            :href="'mailto:' + contactDetails.content.email"
                            class="inline-flex items-center gap-1.5 rounded-full bg-pink-50 px-3 py-1 font-medium text-pink-600"
                        >
                            <Mail class="h-3.5 w-3.5" />
                            {{ contactDetails.content.email }}
                        </a>
                        <a
                            v-if="contactDetails.content.phone"
                            :href="'tel:' + contactDetails.content.phone"
                            class="inline-flex items-center gap-1.5 rounded-full bg-pink-50 px-3 py-1 font-medium text-pink-600"
                        >
                            <Phone class="h-3.5 w-3.5" />
                            {{ contactDetails.content.phone }}
                        </a>
                        <span
                            v-if="contactDetails.content.location"
                            class="inline-flex items-center gap-1.5 rounded-full bg-pink-50 px-3 py-1 font-medium text-pink-600"
                        >
                            <MapPin class="h-3.5 w-3.5" />
                            {{ contactDetails.content.location }}
                        </span>
                    </div>
                </div>

                <!-- Stack -->
                <h2 class="funnel-display mt-6 text-xl font-bold text-pink-500">
                    Stack
                </h2>
                <div class="mt-3 grid grid-cols-8 gap-2">
                    <div
                        v-for="tech in stack"
                        :key="tech.name"
                        class="flex flex-col items-center gap-1 rounded-lg border border-pink-100 bg-white px-1.5 py-2"
                    >
                        <svg
                            class="h-7 w-7"
                            viewBox="0 0 128 128"
                            xmlns="http://www.w3.org/2000/svg"
                            v-html="tech.svg"
                        />
                        <span
                            class="funnel-display text-[10px] font-semibold text-gray-700"
                            >{{ tech.name }}</span
                        >
                    </div>
                </div>

                <!-- Experience heading -->
                <h2 class="funnel-display mt-5 text-xl font-bold text-pink-500">
                    Experience
                </h2>

                <!-- Employers -->
                <div class="mt-3 space-y-3">
                    <article
                        v-for="(employer, i) in employers"
                        :key="i"
                        class="employer rounded-xl border border-pink-100 bg-pink-50/40 p-4"
                    >
                        <div class="flex items-start gap-3">
                            <div
                                class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-pink-100"
                            >
                                <Building2 class="h-4 w-4 text-pink-500" />
                            </div>
                            <div class="flex-1">
                                <h3
                                    class="funnel-display text-base font-bold text-gray-900"
                                >
                                    {{ employer.role }}
                                </h3>
                                <div
                                    class="mt-0.5 flex flex-wrap items-center gap-x-3 gap-y-0.5 text-[11.5px] text-gray-600"
                                >
                                    <span class="font-semibold text-gray-800">{{
                                        employer.company
                                    }}</span>
                                    <span
                                        class="inline-flex items-center gap-1"
                                    >
                                        <Calendar class="h-3 w-3" />
                                        {{ employer.period }}
                                    </span>
                                </div>
                                <p
                                    class="mt-2 text-[11.5px] leading-relaxed text-gray-700"
                                >
                                    {{ employer.summary }}
                                </p>

                                <div
                                    v-if="employer.projects?.length"
                                    class="mt-3 space-y-2"
                                >
                                    <div
                                        v-for="(
                                            project, j
                                        ) in employer.projects"
                                        :key="j"
                                        class="rounded-lg bg-white p-3"
                                    >
                                        <div class="flex items-start gap-2">
                                            <FolderOpen
                                                class="mt-0.5 h-3.5 w-3.5 flex-shrink-0 text-pink-400"
                                            />
                                            <div class="flex-1">
                                                <div
                                                    class="flex flex-wrap items-baseline gap-x-2 gap-y-0.5"
                                                >
                                                    <h4
                                                        class="funnel-display text-[12.5px] font-semibold text-gray-900"
                                                    >
                                                        {{ project.name }}
                                                    </h4>
                                                    <span
                                                        class="inline-flex items-center gap-1 text-[10.5px] text-gray-500"
                                                    >
                                                        <Calendar
                                                            class="h-2.5 w-2.5"
                                                        />
                                                        {{ project.period }}
                                                    </span>
                                                </div>
                                                <p
                                                    class="mt-0.5 text-[11px] leading-snug text-gray-600"
                                                >
                                                    {{ project.description }}
                                                </p>
                                                <ul
                                                    v-if="
                                                        project.bullets?.length
                                                    "
                                                    class="mt-1.5 space-y-1"
                                                >
                                                    <li
                                                        v-for="(
                                                            bullet, k
                                                        ) in project.bullets"
                                                        :key="k"
                                                        class="flex items-start gap-1.5 text-[11px] leading-snug text-gray-700"
                                                    >
                                                        <span
                                                            class="mt-1.5 h-1 w-1 flex-shrink-0 rounded-full bg-pink-400"
                                                        ></span>
                                                        {{ bullet }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Products heading -->
                <h2 class="funnel-display mt-5 text-xl font-bold text-pink-500">
                    Products
                </h2>

                <!-- Products -->
                <div class="mt-3 space-y-3">
                    <article
                        v-for="product in products"
                        :key="product.name"
                        class="employer rounded-xl border border-pink-100 bg-pink-50/40 p-4"
                    >
                        <div class="flex items-start gap-3">
                            <div
                                class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-pink-100"
                            >
                                <Rocket class="h-4 w-4 text-pink-500" />
                            </div>
                            <div class="flex-1">
                                <div
                                    class="flex flex-wrap items-baseline gap-x-2 gap-y-0.5"
                                >
                                    <h3
                                        class="funnel-display text-base font-bold text-gray-900"
                                    >
                                        {{ product.name }}
                                    </h3>
                                    <span
                                        v-if="product.status === 'in-progress'"
                                        class="rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-semibold text-amber-700"
                                    >
                                        In development
                                    </span>
                                </div>
                                <div
                                    class="mt-0.5 flex flex-wrap items-center gap-x-3 gap-y-0.5 text-[11.5px] text-gray-600"
                                >
                                    <span class="font-semibold text-gray-800">{{
                                        product.role
                                    }}</span>
                                    <span
                                        v-if="product.period"
                                        class="inline-flex items-center gap-1"
                                    >
                                        <Calendar class="h-3 w-3" />
                                        {{ product.period }}
                                    </span>
                                    <a
                                        v-if="product.url"
                                        :href="product.url"
                                        class="inline-flex items-center gap-1"
                                    >
                                        <Globe class="h-3 w-3" />
                                        {{ displayUrl(product.url) }}
                                    </a>
                                </div>
                                <p
                                    class="mt-2 text-[11.5px] leading-relaxed text-gray-700"
                                >
                                    {{ product.cv.description }}
                                </p>
                                <ul
                                    v-if="product.cv.bullets.length"
                                    class="mt-1.5 space-y-1"
                                >
                                    <li
                                        v-for="(bullet, k) in product.cv
                                            .bullets"
                                        :key="k"
                                        class="flex items-start gap-1.5 text-[11px] leading-snug text-gray-700"
                                    >
                                        <span
                                            class="mt-1.5 h-1 w-1 flex-shrink-0 rounded-full bg-pink-400"
                                        ></span>
                                        {{ bullet }}
                                    </li>
                                </ul>
                                <div class="mt-2 flex flex-wrap gap-1">
                                    <span
                                        v-for="tag in product.tech"
                                        :key="tag.name"
                                        class="rounded-full border border-pink-100 bg-white px-2 py-0.5 text-[10px] font-semibold text-gray-700"
                                    >
                                        {{ tag.name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Education heading -->
                <template v-if="qualifications.length">
                    <h2
                        class="funnel-display mt-5 text-xl font-bold text-pink-500"
                    >
                        {{ educationTitle }}
                    </h2>

                    <!-- Qualifications -->
                    <div class="mt-3 space-y-3">
                        <article
                            v-for="(qualification, i) in qualifications"
                            :key="'qualification-' + i"
                            class="employer rounded-xl border border-pink-100 bg-pink-50/40 p-4"
                        >
                            <div class="flex items-start gap-3">
                                <div
                                    class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg"
                                    :class="
                                        qualification.logo
                                            ? 'bg-white p-1'
                                            : 'bg-pink-100'
                                    "
                                >
                                    <img
                                        v-if="qualification.logo"
                                        :src="qualification.logo"
                                        :alt="
                                            qualification.institution + ' logo'
                                        "
                                        class="h-full w-full object-contain"
                                    />
                                    <GraduationCap
                                        v-else
                                        class="h-4 w-4 text-pink-500"
                                    />
                                </div>
                                <div class="flex-1">
                                    <h3
                                        class="funnel-display text-base font-bold text-gray-900"
                                    >
                                        {{ qualification.institution }}
                                    </h3>
                                    <div
                                        class="mt-0.5 flex flex-wrap items-center gap-x-3 gap-y-0.5 text-[11.5px] text-gray-600"
                                    >
                                        <span
                                            class="font-semibold text-gray-800"
                                            >{{ qualification.degree }}</span
                                        >
                                        <span
                                            v-if="qualification.award"
                                            class="inline-flex items-center gap-1"
                                        >
                                            <Award class="h-3 w-3" />
                                            {{ qualification.award }}
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-1"
                                        >
                                            <Calendar class="h-3 w-3" />
                                            {{ qualification.period }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<style scoped>
@media print {
    * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        color-adjust: exact !important;
    }

    @page {
        size: A4 portrait;
        margin: 0;
    }
}

a {
    color: #ec4899 !important;
}
</style>
