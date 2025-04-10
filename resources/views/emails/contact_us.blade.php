@component('mail::message')
# Contact Us Message

**Name:** {{ $details['name'] }}

**Email:** {{ $details['email'] }}

**Phone:** {{ $details['phone'] }}

**Subject:** {{ $details['subject'] }}

**Message:**
{{ $details['message'] }}

Thanks,<br>
Care Fusion Partner
@endcomponent
