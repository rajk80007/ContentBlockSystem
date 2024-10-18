<?php

namespace App\Traits;
use App\Models\ContentBlock;
trait HasContentBlocks
{
    public function contentBlocks()
    {
        return $this->morphMany(ContentBlock::class, 'blockable');
    }

    public function addContentBlock($type, $data)
    {
        // dd($type);
        $block = new ContentBlock();
        $block->page_id = $this->id;
        $block->type = $type;
        $block->title = $data['title'] ?? null;
        $block->content = $type === 'text' ? $data['content'] : $data['content'];
        $block->blockable_id = $this->id;
        $block->blockable_type = get_class($this);
        $block->save();
        return $block;
    }
    //     return $this->contentBlocks()->create([
    //         'title' => $data['title'] ?? null, // Store title if available
    //         'content' => $data['content'], // Store content
    //         'type' => $type, // e.g., 'text', 'image'
    //     ]);
    // }
}
