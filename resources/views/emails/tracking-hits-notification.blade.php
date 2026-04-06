<x-mail::message>
# CV Tracking Hits

The following tracking codes received hits in the last 4 hours:

<x-mail::table>
| Code | Entity | Total Hits | Last Hit |
|:-----|:-------|-----:|:---------|
@foreach ($trackingCodes as $tc)
| {{ $tc->code }} | {{ $tc->entity }} | {{ $tc->hit_count }} | {{ $tc->last_hit_at->format('H:i') }} ({{ $tc->last_hit_at->isToday() ? 'today' : 'yesterday' }}) |
@endforeach
</x-mail::table>
</x-mail::message>
