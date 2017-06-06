<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Channel;
use App\Http\Requests\ChannelUpdateRequest;

class ChannelSettingsController extends Controller
{
    public function edit(Channel $channel)
    {
      // Check through policy if user is authorize to see this edit page
      $this->authorize('edit', $channel);

      return view('channel.settings.edit',[
        'channel' => $channel
      ]);
    }

    public function update(ChannelUpdateRequest $request, Channel $channel)
    {
      // Check through policy if user is authorize to see update the channel info
      $this->authorize('update', $channel);

      $channel->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'description' => $request->description
      ]);

      return redirect()->to("/channel/{$channel->slug}/edit");
    }
}
