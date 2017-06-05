<?php

use Zhiyi\Plus\Models\Permission;
use Zhiyi\Plus\Models\CommonConfig;
use Illuminate\Support\Facades\Schema;

// delete perm.
Permission::where('name', 'like', 'im-%')->delete();

// delete config.
CommonConfig::byNamespace('common')->where('name', 'like', 'im:%')->delete();

// delete tables.
Schema::dropIfExists('im_users');
Schema::dropIfExists('im_conversations');
