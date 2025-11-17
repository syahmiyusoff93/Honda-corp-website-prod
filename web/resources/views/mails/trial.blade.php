@php
    //dd($data['quote']->quoteText);
@endphp
<div>Yo {{@$data['recipient']['name']}},</div>
<br>
<div>This is a cubaan sent from [[LOCAL]] at {{date('Y-m-d H:i:s') }}.</div>
<br>
<div>A random quote for you:</div>
<br>
<div>"<span style="font-style:italic;">{{@$data['quote']->quoteText}}</span>"</div>
<br>
<div style="padding-left:20px;">- {{@$data['quote']->quoteAuthor}}</div>
<br>
<div>Have a great one, you deserve it!</div>
