# 创建会话

##接口地址
`/api/v2/im/conversations/{cid}`

##请求方法
`get`

##特别说明
地址中的cid为对话id,如果该对话id不存在会返回错误

## 返回体
```
Status 201 Created
```

```json5
{
    "user_id": 13,
    "cid": 8,
    "name": "",
    "pwd": "",
    "type": 0,
	  "uids": "13,1002"
}
```
## 返回字段
| name     | type     | must     | description |
|----------|:--------:|:--------:|:--------:|
|user_id			|int		|yes		|创建用户的uid|
|cid		|int		|yes		|会话id|
|name		|string	   | yes		 |会话名称|
|pwd		|string	   | yes		 |加入密钥，字符串，type=0时此项为空字符串|
|type  		| int      | yes      | 当前会话类型|
|uids		|string	   | yes		 |逗号分隔的聊天成员ID|

