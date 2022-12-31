import React from "react";
import { Inertia } from "@inertiajs/inertia";
import { Link, useForm, useState } from '@inertiajs/inertia-react';
import Authenticated from "@/Layouts/AuthenticatedLayout";
import './APP.css';

const Index = (props) => {
    const { futures } = props;
    const { me } = props;
    const {data, setData, post} = useForm({
        search: "",
    });
    const handleSendPosts = (e) => {
        e.preventDefault();
        post("/future/search");
    }

    console.log(futures)

    return (
        <html>
        <head>
            <meta name="csrf-token" content="{{ csrf_token() }}"/>
        </head>
            <body>
                <div className="flex justify-center" id="first_header">
                    <nav className="header01-nav">
                        <h1 className="header01-logo">タイムカプセル</h1>
                        {props.auth.user ? (
                        <ul className="header01-list">
                            <li className="header01-item"><Link href={`future/register`}><div className="header01">post</div></Link></li>
                            <li className="header01-item"><Link href={`/future/followed/display`}><div className="header02">Follower</div></Link></li>
                            <li className="header01-item"><Link href={`/future/following/display`}><div className="header03">Follow</div></Link></li>
                            <li className="header01-item"><Link href={`/future/mypage/${me}`}><div className="header04">mypage</div></Link></li>
                            <li className="header01-item"><Link href={`/future/share`}><div className="header06">share</div></Link></li>
                            <li className="header01-item"><Link href={`/future/outline`}><div className="header01">outline</div></Link></li>
                            <li className="header01-item"><a href=""><div class="header05">
                                <form method="post" action={route('logout')}>
                                    <div>
                                        <button onclick="event.preventDefault(); this.closest('form').submit();">logout</button>
                                    </div>
                                </form>
                                </div>
                                </a>
                            </li>
                        </ul>
                    ) : (
                        <>
                        <ul className="header01-list">
                            <li className="header01-item"><Link href={route('login')}><div class="header02">login</div></Link></li>
                            <li className="header01-item"><Link href={`/auth/redirect`}><div class="header01">Google login</div></Link></li>
                            <li className="header01-item"><Link href={route('register')}><div class="header03">Register</div></Link></li>
                        </ul>
                        </>
                    )}
                            
                                
                        
                    </nav>
                </div>
                <div className="title">memories to the future</div>
                <div className="form">  
                    <form onSubmit={handleSendPosts}>
                        <div>
                            <h2>ユーザ検索</h2>
                            <input type="text" placeholder="検索" onChange={(e) => setData("search", e.target.value)}/>
                            <button className="mt-2 text-sm hover:text-gray-800" type="submit">検索</button>
                        </div>
                    </form>
                </div>
                
                <div className="content">
                    <div className="box5">
                        { futures.map((future) => (
                        <div key={future.id}>
                            {future.number == 1 ? (
                            <div className="sample_box_title">
                                <div className="theme">個人のタイムカプセル</div>
                                <p className="data_text">{ future.user }さんが{ future.year }に向けて投稿した思い出です。</p>
                            </div>
                            ):(
                            <div className="sample_box_title">
                                <div className="data_text">
                                    <Link href={`/future/ownpage/${future.id}`} >タイムカプセル</Link>
                                </div>
                                <p>{ future.user }さんが{ future.year }に向けて投稿した思い出です。</p>
                            </div>
                            )
                            }
                        </div>
                        )
                        )
                        }
                    </div>
                </div>
            </body>
        </html>
    );
}

export default Index;
