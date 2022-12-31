import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
import './Mypage.css';

const Mypage = (props) => {
    const { mypage } = props; 
    const { profiles } = props; 
    const { me } = props; 
    
    return (
            <body>
                <div class="sample_box5">
                    <h1>マイページです</h1>
                    <p>ようこそ!!{ mypage.name }さん</p>
                    
            {
                (
                   ()=> {
                        if(profiles === null) {
                        return (
                            <Link href={`/future/first_setting/${me}`}>プロフィールを設定する</Link>
                            );
                        } else {
                        return (
                        <div>
                            <Link href={`/future/settingregister/put/${me}`}>編集する</Link>
                            <p>{ profiles.content }</p>
                        </div>
                         )
                        }
                        }
                    )
                ()
            }
            </div>
            
            <div class="button019">
                <Link href={`/future`}>ホームに戻る</Link>
            </div>
            </body>
        );
}

export default Mypage;