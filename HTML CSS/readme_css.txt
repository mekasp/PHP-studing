CSS - таблицы каскадных стилей
* - приминение стилей на все элементы страниц
Стили можно наносить на любые html теги,а такаже классы и идентификаторы

Примеры:
 body{}
 #name
 .name
 .name1, .name2, .name3{}
 input[type=text]

CSS псевдоклассы:
:first-child
:last-child
:nth-child(1){} - применение стилей к конкретному элементу из списка
:active{} - при клике на элемент
:hover{} - применение стилей при наведение курсора

CSS псевдоэлементы:
::after() - псевдоэлемент после содержимого
::before() - псевдоэлемент до содержимого

Основные стили:
 position:
  relative - относительо других элементов
  absolute - поверх других элементов
  fixed - зафиксировть на странице

 Display:
 block.inline-block;

 left:
 top:
 width:
 height:

 background:
 background-color:
 color:
 text-align: - выравнивает текст
 font-size:
 font-family:
 font-weight:
 padding: - внутренний отступ
 margin: - внешний отступ
 border 20px solid color: - рамка
 border-radius: - округление рамки
 float:
 clear: both; - очищает float