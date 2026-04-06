<x-mail::message>
# CV Tracking Hits

The following tracking codes received hits in the last 4 hours:

<x-mail::table>
| Code | Entity | Hits | Last Hit |
|:-----|:-------|-----:|:---------|
@foreach ($trackingCodes as $tc)
| {{ $tc->code }} | {{ $tc->entity }} | {{ $tc->hit_count }} | {{ $tc->last_hit_at->format('Y-m-d H:i') }} |
@endforeach
</x-mail::table>
</x-mail::message>
