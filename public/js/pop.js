
//編集・削除アイコンをhoverしたときにコメントを表示
tippy('.edit', {
    content: "献立を編集する",
    placement: 'top-start',
    arrow: true
  });

tippy('.del', {
content: "献立を削除する",
placement: 'bottom',
arrow: true
});


tippy('.group-edit', {
    content: "グループ名を編集する",
    placement: 'bottom',
    arrow: true
    });

tippy('.group-del', {
    content: "グループを削除する",
    placement: 'top',
    arrow: true
    });

tippy('.create-menu', {
  content: "献立を作成する",
  placement: 'right',
  arrow: true
  });

  tippy('.create-group', {
    content: "グループを作成する",
    placement: 'top',
    arrow: true
    });
  
  
      