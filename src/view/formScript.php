(function () {
    var getRule = function () {
        var rule = <?=json_encode($form->getRules())?>;
        rule.forEach(function (c) {
            if ((c.type == 'cascader' || c.type == 'tree') && Object.prototype.toString.call(c.props.data) == '[object String]') {
                if (c.props.data.indexOf('js.') === 0) {
                    c.props.data = window[c.props.data.replace('js.', '')];
                }
            }
        });
        return rule;
    }, vm = new Vue,name = 'Trensy\FormBuilderExec<?= !$form->getId() ? '' : '_'.$form->getId() ?>';


    function show(msgType, msg){
        var icontype = 4;
        switch(msgType){
            case "tinfo":icontype=4;break;
            case "tsuccess":icontype=1;break;
            case "terror":icontype=2;break;
            case "twarning":icontype=7;break;
            default :icontype = 4;
        }
        layer.msg(msg, {
            time: 250000, //2s后自动关闭
            icon: icontype,
            offset: '100px', //右下角弹出
        });
    }

    function showResponse(responseText)  {
        if(typeof  responseText == 'string') var responseText = $.parseJSON(responseText);
        if((!$.isEmptyObject(responseText.result)) && (!$.isPlainObject(responseText.result))){
        if(responseText.message.msg){
            show(responseText.message.msgType, responseText.message.msg);
        }
        setTimeout(function(){
            location.assign(responseText.result);
        }, 1000);
        }else{
            if(responseText.message.msg){
                show(responseText.message.msgType, responseText.message.msg);
            }
        }
        return false;
    }

    window[name] =  function create(el, callback) {
        if (!el) el = document.body;
        var $f = formCreate.create(getRule(), {
            el: el,
            form:<?=json_encode($form->getConfig('form'))?>,
            row:<?=json_encode($form->getConfig('row'))?>,
			submitBtn:<?=$form->isSubmitBtn() ? '{size:"default", long:false}' : 'false'?>,
			resetBtn:<?=$form->isResetBtn() ? 'true' : '{}'?>,
            upload: {
                onExceededSize: function (file) {
                        show('terror', file.name + '超出指定大小限制');
                 //   vm.$Message.error(file.name + '超出指定大小限制');
                },
                onFormatError: function () {
                        show('terror', file.name + '格式验证失败');
                 //   vm.$Message.error(file.name + '格式验证失败');
                },
                onError: function (error) {
                        show('terror', file.name + '上传失败,(' + error + ')');
                  //  vm.$Message.error(file.name + '上传失败,(' + error + ')');
                },
                onSuccess: function (res) {
                    if(typeof  res == 'string') var res = $.parseJSON(res);
                    if (res.statusCode == 200) {
                        return res.result.filePath;
                    } else {
                       // vm.$Message.error(res.message.msg);
                        show(res.message.msgType, res.message.msg);
                    }
                }
            },
            //表单提交事件
            onSubmit: function (formData) {
                $f.submitStatus({loading: true});
                $.ajax({
                    url: '<?=$form->getAction()?>',
                    type: '<?=$form->getMethod()?>',
                    dataType: 'json',
                    data: formData,
                    success: function (res) {
                        if(typeof  res == 'string') var res = $.parseJSON(res);
                        if (res.statusCode == 200) {
                           // vm.$Message.success(res.message.msg);
                            showResponse(res);
                            formCreate.formSuccess && formCreate.formSuccess(res, $f, formData);
                            callback && callback(0, res, $f, formData);
                            //TODO 表单提交成功!
                        } else {
                            //vm.$Message.error(res.message.msg);
                            show(res.message.msgType, res.message.msg);
                            $f.btn.finish();
                            callback && callback(1, res, $f, formData);
                            //TODO 表单提交失败
                        }
                    },
                    error: function () {
                        show('terror', '表单提交失败');
                       // vm.$Message.error('表单提交失败');
                        $f.btn.finish();
                    }
                });
            }
        });
        return $f;
    };
    return window[name];
}());
