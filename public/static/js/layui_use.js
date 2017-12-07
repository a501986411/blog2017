/**
 * ����layuiģ��
 */
var element;
var laypage;
layui.use(['element','laypage','util'], function(){
    element = layui.element;
    laypage = layui.laypage;
    //������
    layui.util.fixbar({
        bar1: '&#xe641;',
        click: function (type) {
            if (type === 'bar1') {
                var sear = new RegExp('layui-hide');
                if (sear.test($('.blog-share').attr('class'))) {
                    shareIn();
                } else {
                    shareOut();
                }
            }
        }
    });
});
//��ʾ�ٶȷ���
function shareIn() {
    $('.blog-share').unbind('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
    $('.blog-share').removeClass('shareOut');
    $('.blog-share').addClass('shareIn');
    $('.blog-share').removeClass('layui-hide');
    $('.blog-share').addClass('layui-show');
}
//���ذٶȷ���
function shareOut() {
    $('.blog-share').on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $('.blog-share').addClass('layui-hide');
    });
    $('.blog-share').removeClass('shareIn');
    $('.blog-share').addClass('shareOut');
    $('.blog-share').removeClass('layui-show');
}