## markdown summary

#### 兼容html
markdown只包含html标签的一部分，对于没有被包含的html标签，可以直接在md中使用。但是html区块元素比如`<div>、<table>、<pre>、<p>`等标签，必须在前后加上空行与其他内容隔开，还要求他们的开始标签与结尾标签不能用制表符或空格来缩进。例如：
<input type="hidden" value="Just for something ! You can ignore it.">

```html
这是一个普通段落。

<table>
    <tr>
        <td>Foo</td>
    </tr>
</table>

这是另一个普通段落。
```
请注意，在 HTML 区块标签间的 Markdown 格式语法将不会被处理。比如，你在 HTML 区块内使用 Markdown 样式的`*强调*`会没有效果。

HTML 的区段（行内）标签如 `<span>、<cite>、<del>` 可以在 Markdown 的段落、列表或是标题里随意使用。依照个人习惯，甚至可以不用 Markdown 格式，而直接采用 HTML 标签来格式化。举例说明：如果比较喜欢 HTML 的 `<a>` 或 `<img>` 标签，可以直接使用这些标签，而不用 Markdown 提供的链接或是图像标签语法。

和处在 HTML 区块标签间不同，Markdown 语法在 HTML 区段标签间是有效的。
____
#### 特殊字符自动转换
`<和&`字符markdown会根据需要选择是否转换成`&lt;和&amp;`
至于#，只要不在行首就行，当然在` ``` ``` `中出现在行首也是没问题的
____
#### 区块元素
##### 段落
一个 Markdown 段落是由一个或多个连续的文本行组成，它的前后要有一个以上的空行（空行的定义是显示上看起来像是空的，便会被视为空行。比方说，若某一行只包含空格和制表符，则该行也会被视为空行）。普通段落不该用空格或制表符来缩进。
##### 换行
markdown的段内换行是自动的（手动在特定位置按回车对markdown来说是没用的）  
但是你可以先按两个空格再回车，即可实现在任意位置换行（即产生`<br />`标签）
##### 标题

```
#标题1
```
等同于:

```
标题1
===
```

```
##标题2
```
等同于:

```
标题2
---
```
##### 区块引用 Blockquotes
用">"实现  
可以嵌套,通过不同数量的">"  
引用内可以使用其他markdown语法
##### 列表
无序列表以"-或+或*"+" "  
有序列表以"数字"+"."+" "  
有序列表跟数字的顺序并没有什么关系...  
如果两个列表项目间用空行分开，则在输出html的时候markdown会将项目内容用`<p>`标签包起来  
列表项目内包含多个段落时，段落间用一个由4个空格或1个制表符的空行隔开  
如果列表项目里需要用到引用，则>必须缩进：

```
*   A list item with a blockquote:

    > This is a blockquote
    > inside a list item.
```
如果放代码块的话，代码块就需要缩进两次  
##### 代码区块
用缩进4个空格或是1个制表符来实现  
注：对Markdown GFM 来说，当然还可以用以下格式（会有语法高亮哦）:  
` ```java `  
`java代码块`  
` ``` `  
注意` ``` `必须顶格  
##### 分割线
一行中用三个 * 或 - 或 _ 
____
#### 区段元素
##### 链接
行内式：

```
This is [an example](http://example.com/ "Title") inline link.

[This link](http://example.net/) has no title attribute.
```
Title可写可不写  
如果是同主机资源，可以使用相对路径

```
See my [About](/about/ "Title") page for details.

See my [About](/about/) page for details.
```
参考式：  

```
This is [an example][id] reference-style link.
```
接着，在文件的任意处，你可以把这个标记的链接内容定义出来：  

```
[id]: http://example.com/  "Optional Title Here"
或[id]: http://example.com/  (Optional Title Here)
或[id]: http://example.com/ 
```
你也可以把 title 属性放到下一行，也可以加一些缩进，若网址太长的话，这样会比较好看：

```
[id]: http://example.com/  
      "Optional Title Here"
```
链接辨别标签可以有字母、数字、空白和标点符号，但是并不区分大小写  
隐式链接标记功能让你可以省略指定链接标记，如：  

```
[Google][]
```
然后定义链接内容：

```
[Google]: http://google.com/
```
##### 强调
Markdown 使用星号（ * ）和底线（ _ ）作为标记强调字词的符号，被 * 或 _ 包围的字词会被转成用 `<em> `标签包围，用两个 * 或 _ 包起来的话，则会被转成 `<strong>`，例如：  

```
*single asterisks*

_single underscores_

**double asterisks**

__double underscores__
```
但是如果你的 * 和 _ 两边都有空白的话，它们就只会被当成普通的符号。  
如果要在文字前后直接插入普通的星号或底线，你可以用反斜线：  

```
\*this text is surrounded by literal asterisks\*
```
##### 代码
如果要标记一小段行内代码，你可以用反引号把它包起来（`），例如：

```
Use the `printf()` function.
```
如果要在代码区段内插入反引号，你可以用多个反引号来开启和结束代码区段：

```
``There is a literal backtick (`) here.``
```
##### 图片
行内式：  

```
![Alt text](/path/to/img.jpg)

![Alt text](/path/to/img.jpg "Optional title")
```
参考式：

```
![Alt text][id]
```
「id」是图片参考的名称，图片参考的定义方式则和连结参考一样：

```
[id]: url/to/image  "Optional title attribute"
```
到目前为止， Markdown 还没有办法指定图片的宽高，如果你需要的话，你可以使用普通的 `<img>` 标签。
____
#### 其它
##### 自动链接
网址自动链接：

```
<http://example.com/>
```
markdown会转换为：

```
<a href="http://example.com/">http://example.com/</a>
```
邮箱自动链接：

```
<address@example.com>
```
makrdown会自动生成一个邮箱链接  
##### 反斜杠
Markdown 可以利用反斜杠来插入一些在语法中有其它意义的符号，例如：如果你想要用星号加在文字旁边的方式来做出强调效果（但不用 `<em>` 标签），你可以在星号的前面加上反斜杠：  

```
\*literal asterisks\*
```
Markdown 支持以下这些符号前面加上反斜杠来帮助插入普通的符号：

```
\   反斜线
`   反引号
*   星号
_   底线
{}  花括号
[]  方括号
()  括弧
#   井字号
+   加号
-   减号
.   英文句点
!   惊叹号
```
