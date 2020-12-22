<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    $name = [
        "CLB Tình Nguyện Ngọn Lửa Trái Tim",
        "Dự án Khơi nguồn tinh hoa văn hóa Việt",
        "CHANGE",
        "Dự án Khơi nguồn tinh hoa văn hóa Việt",
        "Trung tâm Bảo tồn thiên nhiên Gaia",
        "Nhóm Sáng tạo Khởi nghiệp  Bến Tre",
        "MANTA Sail Training Centre",
        "Trung tâm Bảo tồn thiên nhiên Gaia",
        "Nhóm Sáng tạo Khởi nghiệp  Bến Tre",
        "Hành động vì Động vật Hoang dã {AWO}",
        "CNCC - Cả nhà cùng chơi {Fun For Family}",
        "Nhóm cóc tv",
    ];
    $avatar_arr = [
        'https://cdn.pixabay.com/photo/2018/11/29/22/01/heart-3846613_960_720.png',
    'https://cdn.pixabay.com/photo/2020/05/16/19/57/people-5179001_960_720.png',
    'https://image.freepik.com/free-vector/youth-organization-logo-hummanity-volunteer-activity_7443-114.jpg',
    'https://image.freepik.com/free-vector/hand-heart-logo_8586-155.jpg',
    'https://image.freepik.com/free-vector/abstract-logo-with-human-silhouettes_1025-693.jpg',
    'https://image.freepik.com/free-vector/orange-blue-charity-logo_1025-328.jpg',
    'https://image.freepik.com/free-vector/community-logo_108126-17.jpg',
    'https://image.freepik.com/free-vector/hands-hold-star-logo-template_1453-48.jpg',
    'https://image.freepik.com/free-vector/teamwork-logo_23758-161.jpg',
    'https://image.freepik.com/free-vector/arms-hugging-heart_1025-665.jpg',
    'https://image.freepik.com/free-vector/abstract-colored-logotype_1025-692.jpg',
    'https://as2.ftcdn.net/jpg/03/29/08/89/500_F_329088982_c1j08MmsXrkAnyUhliv87FfnZ0rHEjsg.jpg',
    'https://as2.ftcdn.net/jpg/02/83/13/91/500_F_283139154_x6NnHDuzEhLBMsys16IDumwgJjDmvkWj.jpg',
    'https://image.freepik.com/free-vector/child-care-symbol-logo_1453-51.jpg',
    'https://image.freepik.com/free-vector/bird-logo_2421-309.jpg',
    'https://image.freepik.com/free-vector/plus-gradient-color-logo_99536-461.jpg',
    'https://image.freepik.com/free-vector/people-logo-design_93835-821.jpg',
    'https://image.freepik.com/free-vector/k-letter-logo_98489-6.jpg',
    'https://image.freepik.com/free-vector/hands-holding-earth-logo-template_1453-46.jpg',
    'https://image.freepik.com/free-vector/hands-holding-earth-logo-template_1453-49.jpg',
    'https://i.pinimg.com/564x/df/5d/8d/df5d8d8923ec3a62e614e5ff308c90fb.jpg',
    'https://i.pinimg.com/564x/92/c4/e7/92c4e7aa411d58578ca10dfe32f19c28.jpg',
    'https://i.pinimg.com/564x/2a/32/72/2a3272e2c8e0cec5e4186239028f0d67.jpg',
    'https://i.pinimg.com/564x/46/5d/0c/465d0ce51e5c115bb5f38c1d910897e3.jpg'
];

    $imagePath = function () use ($avatar_arr) {
        $url = $avatar_arr[array_rand($avatar_arr)];
        $filename = Str::random(4).'.png';
        $file = file_get_contents($url);
        $random_name = Str::random(5);
        $name = Storage::disk('local')->getAdapter()->applyPathPrefix($random_name);
        file_put_contents($name, fopen($url, 'r'));
        $path = Storage::disk('s3')->putFileAs('', $name, Str::random(10).'.png');
        Storage::disk('local')->delete($random_name);
        return $path;
    };
    $introduction = [
        "Với mục đích chính là chạy các Dự Án Tình Nguyện ý nghĩa dài hạn. Đối tượng mà CLB hướng đến để hỗ trợ là trẻ em, người già, người khuyết tật. CLB mong muốn và hy vọng được “Thắp Sáng Ước Mơ và Sẻ Chia Hạnh Phúc” đến tất cả những mãnh đời kém may mắn hơn chúng ta, cùng nhau vượt qua nghịch cảnh, vươn tới tương lai tươi sáng hơn.",
        "Bắt đầu từ những hoạt động thực tế năm 2016, walk with me in VietNam là nơi hội tụ những bạn trẻ yêu Văn hóa Việt. Chúng tôi mong muốn đóng góp và lan tỏa vào cộng đồng bằng sứ mệnh phụng sự và tổ chức những sự kiện quảng bá về văn hóa, con người và đất nước Việt Nam cùng dự án Khơi nguồn tinh hoa văn hóa Việt.",
        "Được thành lập năm 2013 bởi người Việt Nam đầu tiên đến Nam Cực, CHANGE khuyến khích, thúc đẩy việc gìn giữ và bảo tồn môi trường thông qua giáo dục và truyền thông sáng tạo nhằm thay đổi thói quen và truyền cảm hứng để cộng đồng cùng hành động tại Việt Nam.\\n\\nCHANGE tập trung vào ba lĩnh vực chính",
        "Bắt đầu từ những hoạt động thực tế năm 2016, walk with me in VietNam là nơi hội tụ những bạn trẻ yêu Văn hóa Việt. Chúng tôi mong muốn đóng góp và lan tỏa vào cộng đồng bằng sứ mệnh phụng sự và tổ chức những sự kiện quảng bá về văn hóa, con người và đất nước Việt Nam cùng dự án Khơi nguồn tinh hoa văn hóa Việt.",
        "Trung tâm Bảo tồn Thiên nhiên GAIA trao quyền và thúc đẩy thực hiện các hoạt động trong lĩnh vực bảo tồn thiên nhiên, bảo vệ môi trường nhằm tạo dựng một tương lai trong đó con người, đặc biệt là tại Việt Nam sống hoà hợp với Trái Đất. GAIA là tổ chức phi lợi nhuận của Việt Nam, được thành lập bởi Liên hiệp các Hội khoa học Kỹ thuật Việt Nam.",
        "NHÓM SÁNG TẠO KHỞI NGHIỆP  BẾN TRE {STKN} -  Bentre Startup Creative Group {BTSCG} tiền thân là Nhóm Sáng tạo Trẻ Bến Tre. Nhóm STKN là tổ chức nghiên cứu, sáng tạo, thúc đẩy giao lưu và hợp tác quốc tế ở Bến Tre được bảo trợ bởi Chương trình MeKong Startup và VUSTA Bến Tre,  nhóm STKN hoạt động theo mô hình  phi lợi nhuận từ năm 2008.",
        "MANTA là trung tâm đào tạo lái thuyền buồm đầu tiên và duy nhất tại Việt Nam. Những HLV gốc ngư dân sẽ giảng dạy các môn thể thao nước và kỹ năng sinh tồn biến đổi khí hậu để thay đổi môi trường và xã hội.",
        "Trung tâm Bảo tồn Thiên nhiên GAIA trao quyền và thúc đẩy thực hiện các hoạt động trong lĩnh vực bảo tồn thiên nhiên, bảo vệ môi trường nhằm tạo dựng một tương lai trong đó con người, đặc biệt là tại Việt Nam sống hoà hợp với Trái Đất. GAIA là tổ chức phi lợi nhuận của Việt Nam, được thành lập bởi Liên hiệp các Hội khoa học Kỹ thuật Việt Nam.",
        "NHÓM SÁNG TẠO KHỞI NGHIỆP  BẾN TRE {STKN} -  Bentre Startup Creative Group {BTSCG} tiền thân là Nhóm Sáng tạo Trẻ Bến Tre. Nhóm STKN là tổ chức nghiên cứu, sáng tạo, thúc đẩy giao lưu và hợp tác quốc tế ở Bến Tre được bảo trợ bởi Chương trình MeKong Startup và VUSTA Bến Tre,  nhóm STKN hoạt động theo mô hình  phi lợi nhuận từ năm 2008.",
        "Tổ chức Hành động vì Động vật hoang dã là tổ chức tình nguyện đầu tiên của thanh niên Việt Nam hoạt động trong lĩnh vực bảo vệ động vật hoang dã, bảo vệ đa dạng sinh học với mục đích liên kết tình nguyện viên tại các thành phố Hồ Chí Minh, Hà Nội và các tỉnh thành khác lại với nhau cùng chung tay hành động góp phần bảo vệ động vật hoang dã nói riêng và thiên nhiên Việt Nam nói chung.",
        "Tạo ra không gian tương tác đa chiều giúp cho phụ huynh & trẻ em có điều kiện tham gia đồng kiến tạo sân chơi cộng đồng có sự đóng góp của chính mình, phát triển theo 12 giá trị sống của Unesco & xây dựng sân chơi hướng tới thành phố thân thiện với trẻ em, tạo nền tảng Service Learning dành cho sinh viên sư phạm mầm non, tiểu học",
        "Nhóm có 4 thành viên chính và 1 số diễn viên phụ.nhóm chuẩn bi đưa vào hoạt động",
    ];
    $problem = [
        "Với mục đích chính là chạy các Dự Án Tình Nguyện ý nghĩa dài hạn. Đối tượng mà CLB hướng đến để hỗ trợ là trẻ em, người già, người khuyết tật. CLB mong muốn và hy vọng được “Thắp Sáng Ước Mơ và Sẻ Chia Hạnh Phúc” đến tất cả những mãnh đời kém may mắn hơn chúng ta, cùng nhau vượt qua nghịch cảnh, vươn tới tương lai tươi sáng hơn.",
        "Thành lập cộng đồng walk with me in VN\\nNghiên cứu, tìm hiểu và phát triển dự án khơi nguồn tinh hoa Văn hóa Việt",
        "1. Kêu gọi công chúng ủng hộ năng lượng tái tạo và loại bỏ nhiên liệu hoá thạch nhằm suy giảm sự nóng lên toàn cầu. \\n2.CHANGE cộng tác cùng tổ chức thế giới WILDAID nhằm giảm thiểu nhu cầu tiêu thụ các sản phẩm hoang dã ở Việt Nam, đặc biệt là sừng tê giác, tê tê và ngà voi.\\n3. iCHANGE Plastics - Cùng hành động không dùng ni lông” để kêu gọi cộng đồng sử dụng những sản phẩm thay thế khác lâu bền và thân thiện môi trường hơn thay vì sử dụng túi ni lông hay chai nước nhựa tiện dụng.",
        "Thành lập cộng đồng walk with me in VN\\nNghiên cứu, tìm hiểu và phát triển dự án khơi nguồn tinh hoa Văn hóa Việt",
        "1. Việt Nam là một trong những nước có tài nguyên đa dạng sinh học giàu có. Tuy nhiên, hơn 950 loài động thực vật hoang dã đang đứng trước nguy cơ tuyệt chủng và bị ghi danh trong Sách Đỏ Việt Nam. Nguyên nhân chính là do nạn tiêu thụ, buôn bán, vận chuyển, săn bắt trái phép. Ngoài ra, giảm diện tích rừng, mất đa dạng sinh học ảnh hưởng đến chất lượng cuộc sống của mọi người .\\n\\n2. Rác thải không được tái chế, tái sử dụng, tiết chế hợp lý gây ô nhiễm môi trường, ô nhiễm đất, nước, không khí, lãng phí tài nguyên. Việc bỏ rác không đúng chỗ của học sinh, người lớn, không chỉ gây mất mỹ quan mà còn tác động xấu đến môi trường.",
        "1. Tổ chức, củng cố, xây dựng Nhóm đi vào hoạt động, từng bước hướng tới mô hình tổ chức nghiên cứu KH-CN và phát triển cộng đồng;\\n2. Nòng cốt tham gia họat động của tổ chức Tình nguyện quốc tế tại Việt Nam thông qua các chương trình, dự án do Chương trình MeKong Startup và VUSTA Bến Tre chủ quản. Xác lập mối quan hệ, xúc tiến cơ hội du học, hội nghị, hội thảo ngòai nước với các đối tác nước ngoài tại Việt Nam họat động theo giấy phép của cơ quan chức năng Việt Nam và UBND tỉnh Bến Tre;\\n3. Xúc tiến quan hệ, thu thập thông tin, xử lý để cung cấp {dưới 3 hình thức văn bản, bản tin thông báo và trên mạng} cho thành viên trong nhóm và các đối tượng khác có nhu cầu. Qua đó xác lập và mở rộng kênh quan hệ, hội nhập. Thể nghiệm hình thành bộ phận tư vấn, dịch vụ cho các đối tượng khai thác thông tin và xây dựng chương trình, đề án từ nguồn thông tin này. Nhóm kết nối và khai thác sử dụng các trang tin điện tử vì mục đích phát triển cộng đồng, phi lợi nhuận thông qua website của nhóm và nhà trường;\\n4. Nhóm STKN là đầu mối phối hợp triển khai họat động khởi nghiệp, ươm tạo doanh nghiệp với Trung tâm xúc tiến đầu tư & Khởi nghiệp tỉnh;\\n5. Hình thành và duy trì hoạt động của Hệ sinh thái sáng tạo khởi nghiệp tỉnh Bến Tre với Hội quán STKN Bến Tre",
        "Đạt hơn 14Mục Tiêu Phát Triển Bền Vững Quốc Tế của Liên Hợp Quốc",
        "1. Việt Nam là một trong những nước có tài nguyên đa dạng sinh học giàu có. Tuy nhiên, hơn 950 loài động thực vật hoang dã đang đứng trước nguy cơ tuyệt chủng và bị ghi danh trong Sách Đỏ Việt Nam. Nguyên nhân chính là do nạn tiêu thụ, buôn bán, vận chuyển, săn bắt trái phép. Ngoài ra, giảm diện tích rừng, mất đa dạng sinh học ảnh hưởng đến chất lượng cuộc sống của mọi người .\\n\\n2. Rác thải không được tái chế, tái sử dụng, tiết chế hợp lý gây ô nhiễm môi trường, ô nhiễm đất, nước, không khí, lãng phí tài nguyên. Việc bỏ rác không đúng chỗ của học sinh, người lớn, không chỉ gây mất mỹ quan mà còn tác động xấu đến môi trường.",
        "1. Tổ chức, củng cố, xây dựng Nhóm đi vào hoạt động, từng bước hướng tới mô hình tổ chức nghiên cứu KH-CN và phát triển cộng đồng;\\n2. Nòng cốt tham gia họat động của tổ chức Tình nguyện quốc tế tại Việt Nam thông qua các chương trình, dự án do Chương trình MeKong Startup và VUSTA Bến Tre chủ quản. Xác lập mối quan hệ, xúc tiến cơ hội du học, hội nghị, hội thảo ngòai nước với các đối tác nước ngoài tại Việt Nam họat động theo giấy phép của cơ quan chức năng Việt Nam và UBND tỉnh Bến Tre;\\n3. Xúc tiến quan hệ, thu thập thông tin, xử lý để cung cấp {dưới 3 hình thức văn bản, bản tin thông báo và trên mạng} cho thành viên trong nhóm và các đối tượng khác có nhu cầu. Qua đó xác lập và mở rộng kênh quan hệ, hội nhập. Thể nghiệm hình thành bộ phận tư vấn, dịch vụ cho các đối tượng khai thác thông tin và xây dựng chương trình, đề án từ nguồn thông tin này. Nhóm kết nối và khai thác sử dụng các trang tin điện tử vì mục đích phát triển cộng đồng, phi lợi nhuận thông qua website của nhóm và nhà trường;\\n4. Nhóm STKN là đầu mối phối hợp triển khai họat động khởi nghiệp, ươm tạo doanh nghiệp với Trung tâm xúc tiến đầu tư & Khởi nghiệp tỉnh;\\n5. Hình thành và duy trì hoạt động của Hệ sinh thái sáng tạo khởi nghiệp tỉnh Bến Tre với Hội quán STKN Bến Tre",
        "Triển khai các sáng kiến, giải pháp cộng đồng thúc đẩy giáo dục; Truyền thông nâng cao tiếng nói của thanh niên, trẻ em trong công tác bảo tồn động vật hoang dã và bảo vệ thiên nhiên.",
        "Phụ huynh chưa có nhiều điều kiện, nhiều môi trường được tham gia đồng kiến tạo sân chơi cho chính mình và con trẻ cùng chơi",
        "Tôi muốn 1 nhà tại chợ. Hổ chợ cho chúng tôi kinh phí để cậy dựng và tạo lập nhóm",
    ];
    $activity = [
        "Lớp Học Nhân Ái.\\nRạp Chiếu Phim Dạo.\\nGian Hàng 2.000đ. \\nChương trình Nấu Ăn.\\nVăn Nghệ, Ca Nhạc.\\nTủ Sách Siêu Anh Hùng.\\nNgười Chơi Hạnh Phúc.\\nTiếp Sức Bệnh Nhân.\\nDáng Hình Thanh Âm.\\nCứu Hộ Động Vật.",
        "Nghiên cứu/viết bài/tổ chức sự kiện {Tọa đàm, triển lãm..} về văn hóa Việt Nam\\nTìm hiểu, kết nối, giới thiệu và quảng bá văn hóa VN trên trang quốc tế\\nkết hợp quảng bá với công ty du lịch và tổ chức phi chính phủ",
        "Trong các chiến dịch chống biến đổi khí hậu, CHANGE cùng đồng hành với phong trào toàn cầu về biến đổi khí hậu <a href=\\http",
        "Nghiên cứu/viết bài/tổ chức sự kiện {Tọa đàm, triển lãm..} về văn hóa Việt Nam\\nTìm hiểu, kết nối, giới thiệu và quảng bá văn hóa VN trên trang quốc tế\\nkết hợp quảng bá với công ty du lịch và tổ chức phi chính phủ",
        "1. Chương trình đồng hành cùng các công ty, doanh nghiệp \\Trồng và giám sát rừng\\ tại Vườn quốc gia và Khu bảo tồn thiên nhiên để cùng cung cấp thức ăn, tạo môi trường sống và bảo vệ loài động vật hoang dã.\\n2. Chương trình kết nối giới trẻ với bảo tồn thiên nhiên \\Trại Thiên nhiên Gaia\\",
        "Nhóm STKN đã phát triển dựa trên tiền đề từ thực tiễn hoạt động các dự án được thành viên chủ chốt của nhóm tham gia các dự án được các cấp có thẩm quyền phê duyệt",
        "Mỗi ngày, MANTA cung cấp cho các khách hàng không đặt trước/khách hàng đã đặt trước qua mạng",
        "1. Chương trình đồng hành cùng các công ty, doanh nghiệp \\Trồng và giám sát rừng\\ tại Vườn quốc gia và Khu bảo tồn thiên nhiên để cùng cung cấp thức ăn, tạo môi trường sống và bảo vệ loài động vật hoang dã.\\n2. Chương trình kết nối giới trẻ với bảo tồn thiên nhiên \\Trại Thiên nhiên Gaia\\",
        "Nhóm STKN đã phát triển dựa trên tiền đề từ thực tiễn hoạt động các dự án được thành viên chủ chốt của nhóm tham gia các dự án được các cấp có thẩm quyền phê duyệt",
        "•\\tThực hiện các hoạt động khảo sát, điều tra, giám sát và nghiên cứu nhằm cung cấp các thông tin, dẫn liệu; tìm kiếm và xây dựng các giải pháp khoa học giải quyết những vấn đề thiên nhiên và đa dạng sinh học.\\n•\\tTổ chức các hoạt động, tập huấn nhằm trang bị các kiến thức, truyền cảm hứng và hỗ trợ triển khai, đồng hành với các sáng kiến thanh niên về bảo vệ thiên nhiên và bảo tồn đa dạng sinh học.\\n•\\tTruyền thông giáo dục nâng cao nhận thức, thúc đẩy sự tham gia và tăng cường tiếng nói của cộng đồng trong công tác bảo tồn đa dạng sinh học, bảo vệ thiên nhiên.\\n•\\tTạo lập, triển khai và chuyển giao các giải pháp, ứng dụng, sản phẩm vì cộng đồng trong công tác bảo vệ thiên nhiên, bảo tồn đa dạng sinh học.",
        "○ Các hoạt động tại Fun Store",
        "Review sản phẩm. Đồ ăn của thành phố. Và quảng cáo cửa hàng",
    ];
    $mission = [
        "Với mục đích chính là chạy các Dự Án Tình Nguyện ý nghĩa dài hạn. Đối tượng mà CLB hướng đến để hỗ trợ là trẻ em, người già, người khuyết tật. CLB mong muốn và hy vọng được “Thắp Sáng Ước Mơ và Sẻ Chia Hạnh Phúc” đến tất cả những mãnh đời kém may mắn hơn chúng ta, cùng nhau vượt qua nghịch cảnh, vươn tới tương lai tươi sáng hơn.",
        "Sứ mệnh của tổ chức là Khơi nguồn tinh hoa Văn hóa Việt để những người Việt được thấy lại nếp sống và những di sản văn hóa ấy để Văn hóa Việt trở thành nguồn mạch tâm thức nuôi dưỡng tâm hồn mỗi người con Việt. Bên cạnh đó, dự án cũng có sứ mệnh giới thiệu nét đẹp tinh hoa trong văn hóa VN đến với bạn bè quốc tế.",
        "Khuyến khích, thúc đẩy việc gìn giữ và bảo tồn môi trường thông qua giáo dục và truyền thông sáng tạo nhằm thay đổi thói quen và truyền cảm hứng để cộng đồng cùng hành động tại Việt Nam.",
        "Sứ mệnh của tổ chức là Khơi nguồn tinh hoa Văn hóa Việt để những người Việt được thấy lại nếp sống và những di sản văn hóa ấy để Văn hóa Việt trở thành nguồn mạch tâm thức nuôi dưỡng tâm hồn mỗi người con Việt. Bên cạnh đó, dự án cũng có sứ mệnh giới thiệu nét đẹp tinh hoa trong văn hóa VN đến với bạn bè quốc tế.",
        "Trao quyền, thúc đẩy và thực hiện những giải pháp thực tiễn thông qua các hoạt động như",
        "Nghiên cứu, thúc đẩy sáng kiến, sáng tạo nhằm tạo dựng một mạng lưới bao gồm các tổ chức nghiên cứu, nhà trường, doanh nghiệp, tổ chức đoàn thể xã hội, các cá nhân có cùng mối quan tâm liên kết với nhau cùng chăm lo giáo dục thế hệ trẻ, đặc biệt là HSSV thông qua hoạt động nghiên cứu khoa học, sáng tạo; góp phần xây dựng quê hương Bến Tre giàu đẹp trong tương lai. ",
        "Giúp những ngư dân Việt Nam thoát khỏi tình trạng đánh bắt cá quá giới hạn, thoát khỏi các môi trường sống bấp bênh nguy hiểm, thoát khỏi tác động của nhiên liệu hóa thạch, bằng cách chuyển những kỹ năng đi biển vốn có của họ vào các môn thể thao dưới nước. Việc đó phục vụ cho việc phát triển ngành Du Lịch và Thể Thao Dưới Nước của Việt Nam.\\nHuấn luyện ngư dân Việt Nam trở thành những huấn luyện viên và vận động viên quốc gia, hoạt động theo những nguyên tắc nghiêm ngặt của tổ chức Đua Thuyền Buồm Thế Giới {World Sailing}. Và được điều chỉnh để tăng tính an toàn tại Việt Nam.\\n= > Đổi lại, những ngư dân được đào tạo đua thuyền này dạy lại cho các nhóm học sinh các môn thể thao dưới nước và kỹ năng sinh tồn trước biến đổi khí hậu, tuân theo các học phần môi trường và cộng đồng {bằng Tú tài Quốc Tế và IGCSE trong suốt thời gian vận hành của trung tâm. <a href=\\http",
        "Trao quyền, thúc đẩy và thực hiện những giải pháp thực tiễn thông qua các hoạt động như",
        "Nghiên cứu, thúc đẩy sáng kiến, sáng tạo nhằm tạo dựng một mạng lưới bao gồm các tổ chức nghiên cứu, nhà trường, doanh nghiệp, tổ chức đoàn thể xã hội, các cá nhân có cùng mối quan tâm liên kết với nhau cùng chăm lo giáo dục thế hệ trẻ, đặc biệt là HSSV thông qua hoạt động nghiên cứu khoa học, sáng tạo; góp phần xây dựng quê hương Bến Tre giàu đẹp trong tương lai. ",
        "Thực hiện các hoạt động nghiên cứu, thúc đẩy sáng kiến, tạo lập và triển khai các giải pháp cộng đồng vì mục tiêu bảo tồn động vật hoang dã, bảo vệ đa dạng sinh học.",
        "Mang lại niềm vui và hạnh phúc cho các giáo viên, sinh viên sư phạm mầm non, tiểu học và mọi gia đình tham gia các hoạt động tại các không gian từ Sân chơi Dự án, ươm mầm 12 giá trị sống của Unesco thông qua BIỆT ĐỘI NGƯỜI LÀM VƯỜN với triết lý sống Đời Người Rừng Cây",
        "Chúng tôi sẽ cố hết sức để xây dựng clip, videos càn nhiều càn tốt xây dựng được thương hiệu của nhóm để có thể đc nhiều người biết đến.để có thể cộng tác và làm việc với đối tác",
    ];
    $vision =[
        "“Chúng ta không chỉ sống cho tương lai của mình. Mà chúng ta còn là chìa khoá... mở ra ước mơ của những cuộc đời khác.”",
        "Tầm nhìn của Walk with me in VN là trở thành một cộng đồng vững mạnh. Trong đó mọi người đều có cơ hội phát triển bản thân đồng thời nhận diện bản thân và những giá trị cốt yếu của cuộc sống thông qua những hoạt động trải nghiệm, nghiên cứu, tổ chức sự kiện văn hóa - du lịch và thiện nguyện.",
        "Một Việt Nam sạch và xanh được toàn thể người dân Việt Nam chung tay bảo vệ",
        "Tầm nhìn của Walk with me in VN là trở thành một cộng đồng vững mạnh. Trong đó mọi người đều có cơ hội phát triển bản thân đồng thời nhận diện bản thân và những giá trị cốt yếu của cuộc sống thông qua những hoạt động trải nghiệm, nghiên cứu, tổ chức sự kiện văn hóa - du lịch và thiện nguyện.",
        "Một tương lai trong đó con người, đặc biệt là tại Việt Nam sống hoà hợp, bền vững với Trái Đất.",
        "Nhóm STKN Bến Tre ra đời trên tinh thần tự nguyện của thành viên quan tâm đến lĩnh vực nghiên cứu giáo dục với mục tiêu góp phần nâng cao nhận thức của cộng đồng nhất là giới trẻ về sự cần thiết của hoạt động học tập, nghiên cứu, hợp tác vì sự phát triển bền vững của cộng đồng trên địa bàn tỉnh Bến Tre và khu vực.",
        "Truyền thông, phát triển, truyền cảm hứng và chuẩn hóa bộ môn thể thao đua thuyền buồm cho Việt Nam, thành lập đội tuyển quốc gia đa thành phần, với nguồn sinh kế đa dạng hơn cho ngư dân.",
        "Một tương lai trong đó con người, đặc biệt là tại Việt Nam sống hoà hợp, bền vững với Trái Đất.",
        "Nhóm STKN Bến Tre ra đời trên tinh thần tự nguyện của thành viên quan tâm đến lĩnh vực nghiên cứu giáo dục với mục tiêu góp phần nâng cao nhận thức của cộng đồng nhất là giới trẻ về sự cần thiết của hoạt động học tập, nghiên cứu, hợp tác vì sự phát triển bền vững của cộng đồng trên địa bàn tỉnh Bến Tre và khu vực.",
        "AWO phấn đấu trở thành một tổ chức thanh niên uy tín hoạt động trong lĩnh vực bảo tồn động vật hoang dã, bảo vệ đa dạng sinh học.",
        "Là sân chơi thân thiện thu hút các phụ huynh và trẻ em gần nơi cư ngụ thường xuyên tham gia tương tác tạo giá trị giáo trí, nhân văn. Giảm dấu chân carbon do khoảng cách di chuyển ngắn, phát triển cộng đồng sống xanh, sống bền vững",
        "Phấn đấu để lên 1 tầm cao mới. Có thể là nhà phát triển phim hoặc truyền thông quảng cáo cho nhiều tổ chức",
    ];
    $wish = [
        "Mỗi năm triển khai một dự án tình nguyện mới. và được mọi người biết đến nhiều hơn. tuyển được nhiều Leader nhất có thể.",
        "Chiến lược ngắn hạn",
        "1. Kêu gọi công chúng ủng hộ năng lượng tái tạo và loại bỏ nhiên liệu hoá thạch nhằm suy giảm sự nóng lên toàn cầu. \\n2.CHANGE cộng tác cùng tổ chức thế giới WILDAID nhằm giảm thiểu nhu cầu tiêu thụ các sản phẩm hoang dã ở Việt Nam, đặc biệt là sừng tê giác, tê tê và ngà voi, cá mập, hổ..\\n3. iCHANGE Plastics - Cùng hành động không dùng ni lông” để kêu gọi cộng đồng sử dụng những sản phẩm thay thế khác lâu bền và thân thiện môi trường hơn thay vì sử dụng túi ni lông hay chai nước nhựa tiện dụng.",
        "Chiến lược ngắn hạn",
        "1. Tìm kiếm công ty, doanh nghiệp đồng hành cùng Gaia chương trình \\Trồng và giám sát rừng\\, năm 2019 - 2020\\n2. Tìm kiếm nhà tài trợ cho Chương trình Trại thiên nhiên Gaia - Khóa học trường rừng. \\n3. Nâng cao năng lực hướng tới thúc đẩy tái chế, tái sử dụng, tiết chế rác thải tại trường học và cộng đồng. \\n4. Nâng cao năng lực bảo tồn cho cán bộ giáo dục môi trường tại các vườn Quốc gia và Khu Bảo tồn Thiên nhiên Việt Nam và thúc đẩy hoạt động mạng lưới Giáo dục Môi trường Việt Nam.",
        "1- Tư vấn, hướng dẫn thành viên nhóm và các đối tượng khác có nhu cầu, có khả năng tham gia các Dự án do Chương trình MeKong Startup và VUSTA Bến Tre là cơ quan chủ quản {kết nối thực hiện các đề tài nghiên cứu khoa học, tham gia bình chọn, phối hợp tổ chức tập huấn, hội thảo…}; hướng dẫn tham gia các diễn đàn, các cuộc thi do Ngân hàng thế giới {WB} và các tổ chức quốc tế khác tổ chức theo qui định của pháp luật;\\n2. Phối hợp xây dựng tham gia các Chương trình, dự án theo định hướng khai thác thành quả nghiên cứu, ứng dụng tiến bộ KH-CN vào cuộc sống;\\n3. Chủ động phối hợp biên tập và giới thiệu các kỷ yếu hội nghị, hội thảo khoa học, ấn phẩm theo chương trình liên kết với các Nhà xuất bản, các doanh nghiệp;\\n4. Lồng ghép công tác của Nhóm với họat động xã hội, phát triển cộng đồng và hợp tác quốc tế của Chương trình MeKong Startup và VUSTA Bến Tre.\\n5. Phối hợp thực hiện và nhân rộng các dự án phục vụ hình thành hệ sinh thái khởi nghiệp của Chương trình MeKong Startup tại và VUSTA Bến Tre và các chương trình kết nối sau các dự án khởi nghiệp trong và ngoài tỉnh Bến Tre.",
        "Sẽ bổ sung sau",
        "1. Tìm kiếm công ty, doanh nghiệp đồng hành cùng Gaia chương trình \\Trồng và giám sát rừng\\, năm 2019 - 2020\\n2. Tìm kiếm nhà tài trợ cho Chương trình Trại thiên nhiên Gaia - Khóa học trường rừng. \\n3. Nâng cao năng lực hướng tới thúc đẩy tái chế, tái sử dụng, tiết chế rác thải tại trường học và cộng đồng. \\n4. Nâng cao năng lực bảo tồn cho cán bộ giáo dục môi trường tại các vườn Quốc gia và Khu Bảo tồn Thiên nhiên Việt Nam và thúc đẩy hoạt động mạng lưới Giáo dục Môi trường Việt Nam.",
        "1- Tư vấn, hướng dẫn thành viên nhóm và các đối tượng khác có nhu cầu, có khả năng tham gia các Dự án do Chương trình MeKong Startup và VUSTA Bến Tre là cơ quan chủ quản {kết nối thực hiện các đề tài nghiên cứu khoa học, tham gia bình chọn, phối hợp tổ chức tập huấn, hội thảo…}; hướng dẫn tham gia các diễn đàn, các cuộc thi do Ngân hàng thế giới {WB} và các tổ chức quốc tế khác tổ chức theo qui định của pháp luật;\\n2. Phối hợp xây dựng tham gia các Chương trình, dự án theo định hướng khai thác thành quả nghiên cứu, ứng dụng tiến bộ KH-CN vào cuộc sống;\\n3. Chủ động phối hợp biên tập và giới thiệu các kỷ yếu hội nghị, hội thảo khoa học, ấn phẩm theo chương trình liên kết với các Nhà xuất bản, các doanh nghiệp;\\n4. Lồng ghép công tác của Nhóm với họat động xã hội, phát triển cộng đồng và hợp tác quốc tế của Chương trình MeKong Startup và VUSTA Bến Tre.\\n5. Phối hợp thực hiện và nhân rộng các dự án phục vụ hình thành hệ sinh thái khởi nghiệp của Chương trình MeKong Startup tại và VUSTA Bến Tre và các chương trình kết nối sau các dự án khởi nghiệp trong và ngoài tỉnh Bến Tre.",
        "Triển khai sâu rộng, chất lượng các sáng kiến, giải pháp của Tổ chức tới đông đảo cộng đồng trong tương lai gần.",
        "Tổ chức  hoạt động tại các Công Viên, Quán cà phê sách có không gian vui chơi dành cho trẻ em và tiêu dùng có trách nhiệm với môi trường {TRẠM XANH}\\n○ Cả nhà cùng chơi - Giúp phụ huynh có Kho Đồ Chơi và các Hướng Dẫn Trò Chơi tại nhà, tại công viên theo phương thức cả nhà cùng chơi\\n○ KHO NIỀM VUI CỘNG ĐỒNG {FUN STORE} & PHỤ HUYNH THAM GIA LÀM ĐỒ CHƠI TÍCH LŨY ĐIỂM XANH, TRAO ĐỔI SÁCH, TRAO ĐỔI ĐỒ CHƠI, XÂY DỰNG CỘNG ĐỒNG LỐI SỐNG XANH, SỐNG BỀN VỮNG\\n○ VÉ VE CHAI - FUN VOUCHER { VÍ ĐIỆN TỬ XANH} - ĐỔI RÁC ĐỂ CÓ VÉ CẢ NHÀ CÙNG CHƠI CÁC TRÒ CHƠI ĐỂ TẠO QUỸ GỪNG CAY - CHO NGƯỜI CAO TUỔI NEO ĐƠN\\n○ ĐỒNG HÀNH CÁC HOẠT ĐỘNG BẢO VỆ ĐỘNG VẬT HOANG DÃ {TÊ GIÁC, ...}, ĂN CHAY VÌ MÔI TRƯỜNG...\\n○ CHƯƠNG TRÌNH BIỆT ĐỘI NGƯỜI LÀM VƯỜN {Giáo dục, môi trường}\\n○ SÂN CHƠI DÀNH CHO TRẺ",
        "Kế hoạch của nhóm là phát triển việc quảng cáo lên hàng đầu. 5 năm nữa chúng tôi muốn phát triển nhóm lên 1 doanh nghiệp sản xuất và làm phim.",
    ];
    $result =  [
        "Đã và đang  triẻn khai duy trì hoạt động các chương trình dài hạn như:\\nLớp Học Nhân Ái.\\nRạp Chiếu Phim Dạo.\\nGian Hàng 2.000đ. \\nChương trình Nấu Ăn.\\nVăn Nghệ, Ca Nhạc.\\nBên cạnh đó là môt số chương trình thiện nguyện riêng lẻ ngắn hạn khác.",
        "xây dựng được một cộng đồng vui vẻ, dễ thương\\nTổ chức những sự kiện giúp mọi người nhận diện được nét đẹp văn hóa dân tộc\\ntổ chức các chương trình thiện nguyện giúp đỡ cho những người gặp khó khăn trong cuộc sống",
        "35 TỔNG DỰ ÁN CHIẾN DỊCH ĐÃ THỰC HIỆN\\n15,82",
        "xây dựng được một cộng đồng vui vẻ, dễ thương\\nTổ chức những sự kiện giúp mọi người nhận diện được nét đẹp văn hóa dân tộc\\ntổ chức các chương trình thiện nguyện giúp đỡ cho những người gặp khó khăn trong cuộc sống",
        "Trong năm 2017\\n1. Gần 7000 học sinh THCS đã được tham gia các cuộc thi, đố vui có thưởng, nói chuyện về bảo vệ động thực vật hoang dã. \\n2. Tổ chức các buổi sinh hoạt định kỳ hàng tháng cho nhóm 15 bạn sinh viên đến từ các trường Đại học tại TP.Hồ Chí Minh. Tại các buổi sinh hoạt định kỳ, sinh viên được tìm hiểu về nghề bảo tồn và các kiến thức liên quan đến bảo tồn thiên nhiên, bảo vệ động vật hoang dã. Sinh viên được học những kỹ năng sống liên quan, để trở thành người thành công hơn và sẵn sàng đóng góp cho công tác bảo tồn. Sinh viên đồng thời hỗ trợ GAIA xây dựng các tài liệu truyền thông về bảo vệ động vật hoang dã và quản trị các trang mạng xã hội. \\n\\n3. Ba mô hình ủ phân compost dạng quay đã được triển khai tại trường Quốc tế Nam Sài Gòn. Dự kiến, chương trình sẽ được mở rộng cho các nhóm đối tượng khác trên địa bàn thành phố, kèm theo các hướng dẫn sử dụng compost vào việc trồng rau hữu cơ, góp phần bảo vệ môi trường.\\n\\nTiếp tục phát huy tinh thần thì năm 2018, Gaia đạt thành quả: \\n1. Hơn 2000 lượt người tham gia chương trình trải nghiệm thiên nhiên cùng Gaia {học sinh, giáo viên, cán bộ công ty, các bạn trẻ,..}\\n2. Tổ chức thành công 3 khóa học trường rừng - Trại Thiên nhiên Gaia với sự tham gia 74 bạn trẻ trên khắp Việt Nam. Các bạn trẻ được tìm hiểu và khám phá thiên nhiên cùng Gaia phát triển du lịch xanh, không làm tổn hại đến thiên nhiên. \\n3. Xây dựng 2 Rừng cộng đồng tại Khu bảo tồn Thiên nhiên Văn hóa Đồng Nai và Vườn quốc gia BiDoup Núi Bà. Chương trình \\Trồng và giám sát rừng\\ được Gaia thiết kế đặc biệt khi người tham gia hiểu về khu rừng thông qua các hoạt động điều tra, giám sát. \\n4. Kết nối gần 400 lượt tình nguyên viên với bảo tồn thiên nhiên. Các bạn tình nguyện viên được tập huấn kiến thức về bảo tồn thiên nhiên, cùng hỗ trợ Gaia lan tỏa thông điệp bảo tồn thiên nhiên. \\n5. Gaia đẩy mạnh hoạt động truyền thông nâng cao nhận thức tiếp cận 4500 lượt người. \\n6. Xây dựng 5 tập tài liệu về thiên nhiên, động vật tại Vườn quốc gia Phú Quốc, Kiên Giang.",
        "Nhóm STKN là tổ chức nghiên cứu, sáng tạo, thúc đẩy giao lưu và hợp tác quốc tế ở Bến Tre được bảo trợ bởi Chương trình MeKong Startup và VUSTA Bến Tre, nhóm hình thành từ phong trào Sáng tạo Trẻ của Trung ương Đoàn TNCS Hồ Chí Minh từ năm 1998 và từ phong trào này xúc tiến tham gia ngày Sáng tạo Việt Nam của Ngân hàng thế giới  thành viên nhóm tiếp cận từ năm 2005 và đạt giải thưởng VID, VACI các năm 2007, 2008, 2009, 201",
        "+Được công nhận bởi Ủy ban Olympic Việt Nam {VOC} và Bộ Thể Thao là Cố Vấn Đua Thuyền Quốc Gia {2009-2016}\\n+Liên kết với tổ chức Đua Thuyền Thế Giới {World Sailing}\\n+Từng làm việc với Liên Đoàn Đua Thuyền Việt Nam {VCRSF}\\n+Huấn luyện tại Đại Học Thể Dục Thể Thao Thành phố Hồ Chí Minh, kết hợp đua thuyền vào chương trình đào tạo.\\n+Giành học bổng IOC:\\n  +Kế Hoạch Đua Thuyền Quốc Gia Đầu Tiên\\n  +Kế Hoạch Trường Học Quốc Gia Đầu Tiên\\n  + Kế Hoạch Phát Triển Đua Thuyền2011-2016 cho VOC {mục tiêu đưa các môn thể thao đua thuyền vào Đại hội Thể thao Bãi biển châu Á 2016 tại Việt Nam}\\n+Khóa huấn luyện ISAF cấp độ 1 đầu tiên tại Việt Nam, tổ chức bởi VCRSF, tài trợ bởi Đoàn Thể Olympic, tổ chức tại MANTA.\\n+Được tiến cử giải thưởng quốc tế của tổ chức Hơn Cả Thể Thao {Beyond Sports} năm 2017",
        "Trong năm 2017\\n1. Gần 7000 học sinh THCS đã được tham gia các cuộc thi, đố vui có thưởng, nói chuyện về bảo vệ động thực vật hoang dã. \\n2. Tổ chức các buổi sinh hoạt định kỳ hàng tháng cho nhóm 15 bạn sinh viên đến từ các trường Đại học tại TP.Hồ Chí Minh. Tại các buổi sinh hoạt định kỳ, sinh viên được tìm hiểu về nghề bảo tồn và các kiến thức liên quan đến bảo tồn thiên nhiên, bảo vệ động vật hoang dã. Sinh viên được học những kỹ năng sống liên quan, để trở thành người thành công hơn và sẵn sàng đóng góp cho công tác bảo tồn. Sinh viên đồng thời hỗ trợ GAIA xây dựng các tài liệu truyền thông về bảo vệ động vật hoang dã và quản trị các trang mạng xã hội. \\n\\n3. Ba mô hình ủ phân compost dạng quay đã được triển khai tại trường Quốc tế Nam Sài Gòn. Dự kiến, chương trình sẽ được mở rộng cho các nhóm đối tượng khác trên địa bàn thành phố, kèm theo các hướng dẫn sử dụng compost vào việc trồng rau hữu cơ, góp phần bảo vệ môi trường.\\n\\nTiếp tục phát huy tinh thần thì năm 2018, Gaia đạt thành quả: \\n1. Hơn 2000 lượt người tham gia chương trình trải nghiệm thiên nhiên cùng Gaia {học sinh, giáo viên, cán bộ công ty, các bạn trẻ,..}\\n2. Tổ chức thành công 3 khóa học trường rừng - Trại Thiên nhiên Gaia với sự tham gia 74 bạn trẻ trên khắp Việt Nam. Các bạn trẻ được tìm hiểu và khám phá thiên nhiên cùng Gaia phát triển du lịch xanh, không làm tổn hại đến thiên nhiên. \\n3. Xây dựng 2 Rừng cộng đồng tại Khu bảo tồn Thiên nhiên Văn hóa Đồng Nai và Vườn quốc gia BiDoup Núi Bà. Chương trình \\Trồng và giám sát rừng\\ được Gaia thiết kế đặc biệt khi người tham gia hiểu về khu rừng thông qua các hoạt động điều tra, giám sát. \\n4. Kết nối gần 400 lượt tình nguyên viên với bảo tồn thiên nhiên. Các bạn tình nguyện viên được tập huấn kiến thức về bảo tồn thiên nhiên, cùng hỗ trợ Gaia lan tỏa thông điệp bảo tồn thiên nhiên. \\n5. Gaia đẩy mạnh hoạt động truyền thông nâng cao nhận thức tiếp cận 4500 lượt người. \\n6. Xây dựng 5 tập tài liệu về thiên nhiên, động vật tại Vườn quốc gia Phú Quốc, Kiên Giang.",
        "Nhóm STKN là tổ chức nghiên cứu, sáng tạo, thúc đẩy giao lưu và hợp tác quốc tế ở Bến Tre được bảo trợ bởi Chương trình MeKong Startup và VUSTA Bến Tre, nhóm hình thành từ phong trào Sáng tạo Trẻ của Trung ương Đoàn TNCS Hồ Chí Minh từ năm 1998 và từ phong trào này xúc tiến tham gia ngày Sáng tạo Việt Nam của Ngân hàng thế giới  thành viên nhóm tiếp cận từ năm 2005 và đạt giải thưởng VID, VACI các năm 2007, 2008, 2009, 201",
        "- Hơn 5.000 trẻ em là đối tượng thụ hưởng trực tiếp từ các dự án của Tổ chức.\\n- Hơn 10.000 người dân được hưởng lợi từ hoạt động của Tổ chức.\\n- Giám sát hơn 130 địa điểm kinh doanh buôn bán động vật hoang dã.\\n- Tập huấn và đào tạo cho hơn 500 thanh niên trong công tác bảo tồn đa dạng sinh học và động vật hoang dã.\\n- Hỗ trợ hơn 30 sáng kiến thanh niên trong lĩnh vực.",
        "Chúng tôi đang thực hiện được 1 mô hình mẫu tại Bình Tân",
        "Chúng tối đang đợi sự hổ trợ của nhà tài trợ để triển khai nhóm. Và phát triển",
    ];
    return [
        'user_id' => $faker->unique()->randomElement(\App\User::all()
            ->where('role_id','=',2)->pluck('id')->toArray()),
//        'field_id' => \App\Field::all()->random()->id,
        'address' =>$faker->address(),
        'field_id' => 1,
        'avatar' => $imagePath,
        'phone' => $faker->phoneNumber(),
        'founded_year' =>$faker->dateTimeBetween('-5years','-1years'),
        'wish' => $wish[array_rand($wish)],
        'introduction' => $introduction[array_rand($introduction)],
        'problem' => $problem[array_rand($problem)],
        'result' => $result[array_rand($result)],
        'mission' => $mission[array_rand($mission)],
        'vision'=> $vision[array_rand($vision)],
         'activity' => $activity[array_rand($activity)],
        'name' =>$name[array_rand($name)]
    ];
});
