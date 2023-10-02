
1. add_action('a','b')   执行钩子函数,在a时执行b

```php 
   add_action('wp_enqueue_scripts','test_function') 
```
2. wp_enqueue_style('a','b')   a是命名b是路径

3. wp_enqueue_script('a','b','c','d','e') 
```php  
   wp_enqueue_script('main_scripts',get_theme_file_uri('/build/index.js'),NULL,'1.0',true)
   //a：命名，b:路径，c：依赖，d:版本，e:是否在body标签结束前执行
```
4. get_theme_file_uri('a')
```php
   get_theme_file_uri('/images/hero.jpg')
   //获取当前theme下的images文件夹里面的hero.jpg图片
```
5. wp_enqueue_style('a','b')
```php
   wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')
   //加载css文件并命名为'font-awesome'
```
6. get_stylesheet_uri()
```php
   get_stylesheet_uri()
   //获取当前文件夹里面的style.css文件
```
7. add_theme_support()
```php
   add_theme_support('title-tag')
   //获取当前页面的页签名
```