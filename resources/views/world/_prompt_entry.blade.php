<div class="row world-entry">
    <div class="col-12">
        <div class="mb-3">
            <h3 class="mb-0">{!! $prompt->name !!}</h3>
            @if($prompt->prompt_category_id)
                <div><strong>Category: </strong>{!! $prompt->category->displayName !!}</div>
            @endif
            @if($prompt->start_at && $prompt->start_at->isFuture())
                <div><strong>Starts: </strong>{{ format_date($prompt->start_at) }} ({{ $prompt->start_at->diffForHumans() }})</div>
            @endif
            @if($prompt->end_at)
                <div><strong>Ends: </strong>{{ format_date($prompt->end_at) }} ({{ $prompt->end_at->diffForHumans() }})</div>
            @endif
        </div>
        <div class="world-entry-text">
            <p>{{ $prompt->summary }}</p>
            <div class="text-right"><a data-toggle="collapse" href="#prompt-{{ $prompt->id }}" class="text-primary"><strong>Show details...</strong></a></div>
            <div class="collapse" id="prompt-{{ $prompt->id }}">
                <h4>Details</h4>
                @if($prompt->description)
                    {!! $prompt->description !!}
                @else 
                    <p>No further details.</p>
                @endif
            </div>
            <h4>Rewards</h4>
            @if(!count($prompt->rewards))
                No rewards.
            @else 
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th width="70%">Reward</th>
                            <th width="30%">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prompt->rewards as $reward)
                            <tr>
                                <td>{!! $reward->reward->displayName !!}</td>
                                <td>{{ $reward->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="text-right">
            @if($prompt->end_at && $prompt->end_at->isPast())
                <span class="text-secondary">This prompt has ended.</span>
            @elseif($prompt->start_at && $prompt->start_at->isFuture())
                <span class="text-secondary">This prompt is not open for submissions yet.</span>
            @else 
                <a href="#" class="btn btn-primary">Submit Prompt</a>
            @endunless
        </div>
    </div>
</div>