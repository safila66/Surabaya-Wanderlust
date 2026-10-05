<style>
    .auth-body {
        margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px;
        background-image: linear-gradient(rgba(7,17,42,.72), rgba(7,17,42,.88)), url('https://images.unsplash.com/photo-1549473889-14f410d83298?w=1600&q=80');
        background-size: cover; background-position: center; background-attachment: fixed;
    }
    [data-theme="light"] .auth-body {
        background-image: linear-gradient(rgba(232,244,253,.82), rgba(208,233,250,.92)), url('https://images.unsplash.com/photo-1549473889-14f410d83298?w=1600&q=80');
    }
    .auth-card {
        width: 100%; max-width: 430px; padding: 38px 34px 30px; border-radius: 22px;
        background: var(--bg-surface); border: 1px solid var(--gold-border);
        backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
        box-shadow: 0 24px 60px rgba(0,0,0,.35);
    }
    .auth-brand { display: block; text-align: center; text-decoration: none; margin-bottom: 22px; }
    .auth-brand-name { display: block; font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 700; color: var(--gold); }
    .auth-brand-tag { display: block; font-size: 9px; letter-spacing: 3px; text-transform: uppercase; color: var(--text-primary); opacity: .6; margin-top: 3px; }
    .auth-title { font-family: 'Playfair Display', serif; font-size: 34px; font-weight: 700; margin: 0 0 8px; text-align: center; color: var(--text-primary); }
    .auth-sub { text-align: center; font-size: 13.5px; line-height: 1.6; opacity: .75; margin: 0 0 24px; color: var(--text-primary); }
    .auth-card label { display: block; margin-bottom: 6px; font-size: 12px; font-weight: 700; letter-spacing: .5px; text-transform: uppercase; color: var(--text-primary); opacity: .85; }
    .auth-card input {
        width: 100%; box-sizing: border-box; padding: 13px 14px; margin-bottom: 16px; border-radius: 12px;
        border: 1px solid var(--border); background: rgba(255,255,255,.08); color: var(--text-primary);
        font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; outline: none; transition: .2s;
    }
    [data-theme="light"] .auth-card input { background: rgba(255,255,255,.9); }
    .auth-card input:focus { border-color: var(--gold); box-shadow: 0 0 0 3px var(--gold-light); }
    .auth-btn {
        width: 100%; border: 0; padding: 14px; border-radius: 999px; cursor: pointer; margin-top: 4px;
        background: var(--gold); color: #07112a; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 14px; letter-spacing: .5px; transition: .2s;
    }
    .auth-btn:hover { background: var(--gold-dark); transform: translateY(-1px); }
    .auth-error { background: rgba(220,70,70,.15); border: 1px solid rgba(220,70,70,.4); color: #ff9c9c; font-size: 12.5px; padding: 10px 12px; border-radius: 10px; margin-bottom: 16px; }
    [data-theme="light"] .auth-error { color: #a02828; }
    .auth-alt { text-align: center; margin-top: 20px; font-size: 13px; color: var(--text-primary); }
    .auth-alt a { color: var(--gold); font-weight: 700; text-decoration: none; }
    .auth-alt a:hover { text-decoration: underline; }
    .auth-back { display: block; text-align: center; margin-top: 16px; font-size: 12px; color: var(--text-primary); opacity: .6; text-decoration: none; }
    .auth-back:hover { opacity: 1; color: var(--gold); }
</style>
