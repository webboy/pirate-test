New job posting "{{ $job->title }}" is waiting for moderation.
<a href="{{ $job->publish_url() }}">Publish it</a> or <a href="{{ $job->spam_url() }}">Mark as spam</a>