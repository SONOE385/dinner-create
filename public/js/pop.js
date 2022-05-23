
//編集・削除アイコンをhoverしたときにコメントを表示
tippy('.edit', {
    content: "献立を編集する",
    placement: 'top-start',
    arrow: false
  });

tippy('.del', {
content: "献立を削除する",
placement: 'bottom',
arrow: false
});


tippy('.group-edit', {
    content: "グループ名を編集する",
    placement: 'bottom',
    arrow: false
    });

tippy('.group-del', {
    content: "グループを削除する",
    placement: 'top',
    arrow: false
    });

tippy('.create-menu', {
  content: "献立を作成する",
  placement: 'right',
  arrow: false
  });
      