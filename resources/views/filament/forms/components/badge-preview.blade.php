<div class="p-4 border border-dashed border-gray-300 rounded-lg bg-gray-50 max-w-2xl">
    <label class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-2 block text-center">
        Live Badge Preview
    </label>

    @php
        $badgeCode = data_get($getContainer()->getState(), 'badge_code');
    @endphp

    <div class="flex justify-center p-6 bg-white rounded border shadow-sm items-center">
        @if (!empty($badgeCode))
            <div class="credly-badge-wrapper">
                <div class="w-full flex justify-center" wire:ignore>
                    {!! $badgeCode !!}
                </div>
            </div>
        @else
            <div class="text-center">
                <p class="text-gray-400 text-sm italic">Waiting for embed code...</p>
                <p class="text-[10px] text-gray-300">
                    Paste your &lt;iframe&gt; or &lt;script&gt; above
                </p>
            </div>
        @endif
    </div>
</div>

@once
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.hook('message.processed', () => {
                if (typeof window.renderBadge === 'function') {
                    window.renderBadge();
                }
            });
        });
    </script>
@endonce
