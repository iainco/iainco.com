<script setup lang="ts">
const palette = [
    '#a855f7', // purple-500
    '#ec4899', // pink-500
    '#f97316', // orange-500
]

const pageGradient = {
    backgroundImage: `linear-gradient(to bottom right, ${palette.join(', ')})`,
    backgroundAttachment: 'fixed',
}

const today = new Date().toLocaleDateString('en-GB', {
    day: 'numeric',
    month: 'long',
    year: 'numeric',
})
</script>

<template>
    <div class="min-h-screen bg-white">
    <div :style="pageGradient" class="w-[210mm] h-[297mm] mx-auto flex items-center justify-center">
        <div class="w-[190mm] h-[277mm] bg-white rounded-4xl border-4 border-gray-200 flex flex-col px-8">
            <!-- Header with logo -->
            <div class="pt-8 pb-6 flex items-center justify-between border-b-2 border-gray-100">
                <div>
                    <h1 class="funnel-display text-4xl font-bold text-pink-500">iainco</h1>
                    <p class="text-sm text-gray-500">Full Stack Developer</p>
                </div>
                <img
                    src="/iainco.webp"
                    class="w-24 h-auto"
                    alt="iainco"
                />
            </div>

            <!-- Addresses and date -->
            <div class="pt-8 pb-6 flex justify-between text-sm text-gray-600 leading-relaxed">
                <div>
                    <p class="font-semibold text-gray-800 mb-1">From</p>
                    <p>Your Name</p>
                    <p>City, Country</p>
                    <p>your@email.com</p>
                    <p>+00 0000 000000</p>
                </div>
                <div class="text-right">
                    <p class="font-semibold text-gray-800 mb-1">To</p>
                    <p>Hiring Manager</p>
                    <p>Company Name</p>
                    <p>Street Address</p>
                    <p>City, Postcode</p>
                </div>
            </div>

            <!-- Date -->
            <div class="pb-6">
                <p class="text-sm text-gray-600">{{ today }}</p>
            </div>

            <!-- Subject -->
            <div class="pb-4">
                <p class="font-semibold text-gray-800">Re: Job Title</p>
            </div>

            <!-- Body -->
            <div class="flex-1 text-sm text-gray-700 leading-relaxed space-y-4">
                <p>Dear Hiring Manager,</p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.
                </p>

                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                    est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                    laudantium, totam rem aperiam.
                </p>

                <p>
                    <a href="">My online CV</a> covers my experience
                    in detail. I'd welcome the chance to discuss how I can contribute to your team.
                </p>

                <p>I look forward to hearing from you.</p>

                <p>Kind regards,</p>
            </div>

            <!-- Signature -->
            <div class="pb-12 pt-6">
                <p class="font-semibold text-xl text-pink-500">Your Name</p>
            </div>
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